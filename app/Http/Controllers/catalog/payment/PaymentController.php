<?php
namespace App\Http\Controllers\catalog\payment;
use Illuminate\Http\Request;
use App\Http\Controllers\catalog\Controller;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Address;
use PayPal\Api\CreditCard;
use PayPal\Api\FundingInstrument;
use Redirect;
use DB, View, Validator, Route, Auth, File, Carbon\Carbon, Mail, URL, Excel, Session, PDF;
use App\Mail\Email;
use App\SurveySubmission;
use App\FriendAssessment;
class PaymentController extends Controller {
    private $_api_context;
    private $filename;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
		parent::__construct();
        /** PayPal api context **/
        $paypal_conf        = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function index(Request $request, $status = NULL) {
		$price = 0;
		$count = FriendAssessment::where('survey_submission_id', session()->get('submission_id'))->count();
		if($status == 2) {
			$price = $this->data['general_setting']->survey_price - ($this->data['general_setting']->survey_price * (session()->get('coupon')['result']->percentage / 100));
		} else if($status == 0) $price = $this->data['general_setting']->survey_price;
			if($count > 0) $price = $price + ($count * $this->data['general_setting']->friend_assessment_price);
			$payer = new Payer();
			$payer->setPaymentMethod('paypal');
			$item_1 = new Item();
			$item_1->setName($this->data['general_setting']->title)
			/** item name **/
				->setCurrency('USD')
				->setQuantity(1)
				->setPrice($price);
			/** unit price **/
			$item_list = new ItemList();
			$item_list->setItems(array(
				$item_1
			));
			$amount = new Amount();
			$amount->setCurrency('USD')
				->setTotal($price);
			$transaction = new Transaction();
			$transaction->setAmount($amount)->setItemList($item_list)->setDescription('Communication Styles Assessment');
			$redirect_urls = new RedirectUrls();
			$redirect_urls->setReturnUrl(URL::route('catalog-paypal-status'))
			/** Specify return URL **/
				->setCancelUrl(URL::route('catalog-paypal-status'));
			$payment = new Payment();
			$payment->setIntent('Sale')
				->setPayer($payer)->setRedirectUrls($redirect_urls)->setTransactions(array(
				$transaction
			));
			/** dd($payment->create($this->_api_context));exit; **/
			try {
				$payment->create($this->_api_context);
			}
			catch(\PayPal\Exception\PPConnectionException $ex) {
				if (\Config::get('app.debug')) {
					\Session::put('error', 'Connection timeout');
					return Redirect::to('/');
				}
				else {
					\Session::put('error', 'Some error occur, sorry for inconvenient');
					return Redirect::to('/');
				}
			}
			foreach ($payment->getLinks() as $link) {
				if ($link->getRel() == 'approval_url') {
					$redirect_url = $link->getHref();
					break;
				}
			}
			/** add payment ID to session **/
			Session::put('paypal_payment_id', $payment->getId());
			/** add price to session **/
			Session::put('amount', $price);
			if (isset($redirect_url)) {
				/** redirect to paypal **/
				return Redirect::away($redirect_url);
			}
			\Session::put('error', 'Unknown error occurred');
			return Redirect::to('/');
    }
	
	public function getPaymentStatus() {
		/** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
		
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Payment failed');
            return View::make('errors.payment');
        }
        $payment   = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
		
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
			/*Send Email To Employee*/
			$this->data['pdf_view'] = 1;
			$this->data['submission'] = SurveySubmission::join('employee', function ($join) {
				$join->on('employee.id', '=', 'survey_submission.employee_id');
			})
			->where('survey_submission.id', session()->get('submission_id'))
			->select('employee.*', 'survey_submission.*')->first();
			
			/*Fetch Quardinates*/			
			$submission = SurveySubmission::where('id', session()->get('submission_id'))->first();	
			$this->data['employee'] = DB::table('employee')->where('id', $submission->employee_id)->first();
			
			$this->file_name = str_slug($this->data['employee']->first_name, '-').'-'.str_slug($this->data['employee']->last_name, '-');
			
			if($submission->p_status == 0) {
				$r = $submission->r;
				$l = $submission->l;
				$a = $submission->a;
				$b = $submission->b;
				$h_value = $r-$l;
				$v_value = $a-$b;
				$h_value = ($h_value < 0 ? $h_value: '+'.$h_value);
				$v_value = ($v_value < 0 ? $v_value: '+'.$v_value);
				$h_sign = (str_contains($h_value, '-') ? '-' : '+');
				$v_sign = (str_contains($v_value, '-') ? '-' : '+');
				$this->data['record'] = DB::table('score')->where('h', $h_sign)->where('v', $v_sign)->first();
				
				$this->data['sub_quadrant'] = DB::table('sub_quadrant')
					->where('h', 'like', '%' . $h_value . '%')
					->where('v', 'like', '%' . $v_value . '%')
					->first();
				
				PDF::loadView('catalog.survey.pdf', ['data' => $this->data])->save('public/assets/admin/file/Assessment-Result-('.$this->file_name.').pdf', 'overwrite');
				$this->data['view'] = 'emails.survey';
				$this->data['subject'] = "Assessment Result | " . config('app.name');
				$content = "<p>Thank you for completing your Communication Style Assessment.</p>";
				$content .= "<p>The attached report includes customized insight into your specific style.</p>";
				$content .= "<p>Please contact us with any questions.</p>";
				$this->data['content'] = $content;
				$this->data['attachment'] = ['public/assets/admin/file/Assessment-Result-('.$this->file_name.').pdf'];
				Mail::to($this->data['employee']->email)->cc([env("CC_EMAIL")])->send(new Email($this->data));
				
				/*Delete Pdf file*/
				delete_file(['public/assets/admin/file/Assessment-Result-('.$this->file_name.').pdf']);
			}
			
            \Session::put('success', 'Payment success');			
			$submission->p_status = 1;
			$submission->amount = session()->get('amount');
			$submission->save();
			
			/*Send Email To Friends*/
			$this->data['friends'] = FriendAssessment::where('survey_submission_id', $submission->id)->get();
			foreach($this->data['friends'] as $friend) {
				$this->data['view'] = 'emails.friend_assesment';
				$this->data['subject'] = "Peer Assessment Request | " . config('app.name');	
				$this->data['friend'] = $friend;
				Mail::to($friend->email)->send(new Email($this->data));
			}
			
            return redirect(route('catalog-thank-you', [session()->get('submission_id')]));
        }
        \Session::put('error', 'Payment failed');
        return View::make('errors.payment');
    }
}
