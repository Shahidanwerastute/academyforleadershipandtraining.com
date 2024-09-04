<?php
namespace App\Http\Controllers\theme\course;

use Illuminate\Http\Request;
use App\Http\Controllers\theme\Controller;
use App\Course as CourseModel;
use App\Payment;
use Braintree_Transaction;
use Braintree_Customer;
use App\Mail\Email;
use App\Coupon;
use DB, View, Validator, Route, Auth, File, Carbon\Carbon, Mail, URL, Excel, Session, PDF, Storage, Str;

class Course extends Controller
{
  private $_api_context;
  public function __construct()
  {
    parent::__construct();
  }
  public function index(Request $request)
  {
    try {
      return View::make('theme.course.index')->with('data', $this->data);
    } catch (\Exception $e) {
      if ($request->ajax()) {
        return response()->json([
          "success" => false,
          "message" => $e->getMessage(),
        ], 200);
      } else {
        return abort(404);
      }
    }
  }

  public function detail(Request $request, $id, $title)
  {
    try {
      $query = CourseModel::leftJoin('course_date', function ($join) {
        $join->on('course.id', '=', 'course_date.course_id')->where('course_date.active', 1);
      });
      $query->where('course.id', $id);
      $this->data['course'] = $query->select("course.*")->first();
      if (session()->has('course_coupon_percentage' . $this->data['course']->id)) {
        $this->data['course']->orignal_price = $this->data['course']->price;
        $this->data['course']->price = round($this->data['course']->price - ($this->data['course']->price * (session()->get('course_coupon_percentage' . $this->data['course']->id) / 100)));
        $this->data['course']->discount_price = round($this->data['course']->orignal_price * (session()->get('course_coupon_percentage' . $this->data['course']->id) / 100));
      }
      return View::make('theme.course.detail')->with('data', $this->data);
    } catch (\Exception $e) {
      if ($request->ajax()) {
        return response()->json([
          "success" => false,
          "message" => $e->getMessage(),
        ], 200);
      } else {
        return abort(404);
      }
    }
  }

  public function request(Request $request, $id, $title)
  {
    try {
      $query = CourseModel::leftJoin('course_date', function ($join) {
        $join->on('course.id', '=', 'course_date.course_id')->where('course_date.active', 1);
      });
      $query->where('course.id', $id);
      $this->data['course'] = $query->select("course.*")->first();
      if (session()->has('course_coupon_percentage' . $this->data['course']->id)) {
        $this->data['course']->price = round($this->data['course']->price - ($this->data['course']->price * (session()->get('course_coupon_percentage' . $this->data['course']->id) / 100)));
      }
      if ($request->isMethod('post')) {
        $attributes = array(
          'title' => "Title",
          'name' => "Name",
          'email' => "Email",
          'address' => "Adress",
          'mobile' => "Mobile",
        );

        $messages = [
					'g-recaptcha-response.required' => 'Captcha is required!',
				];

        $validator = Validator::make($request->all(), [
          'title' => 'bail|required',
          'name' => 'bail|required',
          'email' => 'bail|required|email',
          'address' => 'bail|required',
          'mobile' => 'bail|required',
          'g-recaptcha-response' => 'required',
        ], $messages, $attributes);

        if (!is_null($request['g-recaptcha-response'])) {
					$captcha = $request['g-recaptcha-response'];
					$secretKey = '6LfccMMUAAAAAGCNuw6JSNbZuzvybPOCU6Cq20qp';
					$ip = $_SERVER['REMOTE_ADDR'];
					$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
					$responseKeys = json_decode($response,true);
					
					if (!$responseKeys["success"]) {
						$validator->errors()->add('g-recaptcha-response', 'Captcha is required!');
					}
				}

        if ($validator->fails()) {
          return response()->json([
            'success' => false,
            'error' => $validator->errors()
          ]);
        } else {

          //save payment
          $this->save_payment($this->data['course'], 'request', "Request");

          return response()->json([
            'success' => true,
            'message' => 'Thank you for your inquiry. We will respond as soon as possible.'
          ]);
        }
      }
      return View::make('theme.course.payment-personal-detail')->with('data', $this->data);
    } catch (\Exception $e) {
      if ($request->ajax()) {
        return response()->json([
          "success" => false,
          "message" => $e->getMessage(),
        ], 200);
      } else {
        return abort(404);
      }
    }
  }

  public function bankcheck(Request $request, $id, $title)
  {
    try {
      $query = CourseModel::leftJoin('course_date', function ($join) {
        $join->on('course.id', '=', 'course_date.course_id')->where('course_date.active', 1);
      });
      $query->where('course.id', $id);
      $this->data['course'] = $query->select("course.*")->first();
      if (session()->has('course_coupon_percentage' . $this->data['course']->id)) {
        $this->data['course']->price = round($this->data['course']->price - ($this->data['course']->price * (session()->get('course_coupon_percentage' . $this->data['course']->id) / 100)));
      }
      if ($request->isMethod('post')) {
        $attributes = array(
          'title' => "Title",
          'name' => "Name",
          'email' => "Email",
          'address' => "Adress",
          'mobile' => "Mobile",
        );
        $messages = [
					'g-recaptcha-response.required' => 'Captcha is required!',
				];
        $validator = Validator::make($request->all(), [
          'title' => 'bail|required',
          'name' => 'bail|required',
          'email' => 'bail|required|email',
          'address' => 'bail|required',
          'mobile' => 'bail|required',
          'g-recaptcha-response' => 'required',
        ], $messages, $attributes);
        if (!is_null($request['g-recaptcha-response'])) {
					$captcha = $request['g-recaptcha-response'];
					$secretKey = '6LfccMMUAAAAAGCNuw6JSNbZuzvybPOCU6Cq20qp';
					$ip = $_SERVER['REMOTE_ADDR'];
					$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
					$responseKeys = json_decode($response,true);
					
					if (!$responseKeys["success"]) {
						$validator->errors()->add('g-recaptcha-response', 'Captcha is required!');
					}
				}
        if ($validator->fails()) {
          return response()->json([
            'success' => false,
            'error' => $validator->errors()
          ]);
        } else {

          //save payment
          $this->save_payment($this->data['course'], 'bankcheck', "Bank Check");

          return response()->json([
            'success' => true,
            'message' => 'Thank you for filling out the form. You will receive a copy via email, for printing purposes.'
          ]);
        }
      }
      return View::make('theme.course.payment-personal-detail')->with('data', $this->data);
    } catch (\Exception $e) {
      if ($request->ajax()) {
        return response()->json([
          "success" => false,
          "message" => $e->getMessage(),
        ], 200);
      } else {
        return abort(404);
      }
    }
  }

  public function payment_personal_detail(Request $request, $id, $title)
  {
    try {
      $query = CourseModel::leftJoin('course_date', function ($join) {
        $join->on('course.id', '=', 'course_date.course_id')->where('course_date.active', 1);
      });
      $query->where('course.id', $id);
      $this->data['course'] = $query->select("course.*")->first();
      if (session()->has('course_coupon_percentage' . $this->data['course']->id)) {
        $this->data['course']->price = round($this->data['course']->price - ($this->data['course']->price * (session()->get('course_coupon_percentage' . $this->data['course']->id) / 100)));;
      }
      if ($request->isMethod('post')) {
        $attributes = array(
          'title' => "Title",
          'name' => "Name",
          'email' => "Email",
          'address' => "Adress",
          'mobile' => "Mobile",
        );
        $messages = [
					'g-recaptcha-response.required' => 'Captcha is required!',
				];
        $validator = Validator::make($request->all(), [
          'title' => 'bail|required',
          'name' => 'bail|required',
          'email' => 'bail|required|email',
          'address' => 'bail|required',
          'mobile' => 'bail|required',
          'g-recaptcha-response' => 'required',
        ], $messages, $attributes);
        
        if (!is_null($request['g-recaptcha-response'])) {
					$captcha = $request['g-recaptcha-response'];
					$secretKey = '6LfccMMUAAAAAGCNuw6JSNbZuzvybPOCU6Cq20qp';
					$ip = $_SERVER['REMOTE_ADDR'];
					$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
					$responseKeys = json_decode($response,true);
					
					if (!$responseKeys["success"]) {
						$validator->errors()->add('g-recaptcha-response', 'Captcha is required!');
					}
        }
        
        if ($validator->fails()) {
          return response()->json([
            'success' => false,
            'error' => $validator->errors()
          ]);
        } else {
          /*save form data in session for next payment process request*/
          session()->put('personal-data', $request->except(['_token']));

          return response()->json([
            'success' => true,
            'redirect' => 1,
            'url' => route('theme-course-payment-form', [$this->data['course']->id, Str::slug($this->data['course']->title, '-')])
          ]);
        }
      }
      return View::make('theme.course.payment-personal-detail')->with('data', $this->data);
    } catch (\Exception $e) {
      if ($request->ajax()) {
        return response()->json([
          "success" => false,
          "message" => $e->getMessage(),
        ], 200);
      } else {
        return abort(404);
      }
    }
  }

  public function payment_form(Request $request, $id, $title)
  {
    try {
      $query = CourseModel::leftJoin('course_date', function ($join) {
        $join->on('course.id', '=', 'course_date.course_id')->where('course_date.active', 1);
      });
      $query->where('course.id', $id);
      $this->data['course'] = $query->select("course.*")->first();
      if (session()->has('course_coupon_percentage' . $this->data['course']->id)) {
        $this->data['course']->price = round($this->data['course']->price - ($this->data['course']->price * (session()->get('course_coupon_percentage' . $this->data['course']->id) / 100)));
      }

      if (session()->has('personal-data')) {
        return View::make('theme.course.payment-form')->with('data', $this->data);
      } else {
        return redirect(route('theme-index', [$this->data['course']->id, Str::slug($this->data['course']->title, '-')]));
      }
    } catch (\Exception $e) {
      if ($request->ajax()) {
        return response()->json([
          "success" => false,
          "message" => $e->getMessage(),
        ], 200);
      } else {
        return abort(404);
      }
    }
  }

  public function payment_process(Request $request, $id, $title)
  {
    try {
      if (session()->has('personal-data')) {
        $query = CourseModel::leftJoin('course_date', function ($join) {
          $join->on('course.id', '=', 'course_date.course_id')->where('course_date.active', 1);
        });
        $query->where('course.id', $id);
        $this->data['course'] = $query->select("course.*")->first();
        if (session()->has('course_coupon_percentage' . $this->data['course']->id)) {
          $this->data['course']->price = round($this->data['course']->price - ($this->data['course']->price * (session()->get('course_coupon_percentage' . $this->data['course']->id) / 100)));
        }

        //get payload info 
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];

        //create braintree customer with unique id
        $customer_id = time();
        $customer_response = \Braintree_Customer::create([
          'id' => $customer_id,
          'firstName' => session()->get('personal-data.name'),
          'company' => session()->get('personal-data.organization'),
          'email' => session()->get('personal-data.email'),
          'phone' => session()->get('personal-data.phone'),
        ]);
        if (isset($customer_response->success) && $customer_response->success) {

          //payment method create 
          $payment_method_response = \Braintree_PaymentMethod::create([
            'customerId' => $customer_id,
            'paymentMethodNonce' => $nonce
          ]);
          if (isset($payment_method_response->success) && $payment_method_response->success) {

            //client nonce 
            $client_nonce = \Braintree_PaymentMethodNonce::create($payment_method_response->paymentMethod->token);

            //Transactions
            $response = \Braintree_Transaction::sale([
              'amount' => round($this->data['course']->price, 2),
              'options' => ['submitForSettlement' => True],
              'paymentMethodNonce' => $client_nonce->paymentMethodNonce->nonce
            ]);

            if (isset($response->success) && $response->success) {
              //save payment
              $this->save_payment($this->data['course'], 'payment', $payload['type'], $client_nonce->paymentMethodNonce->nonce);

              return response()->json([
                "success" => true,
                "message" => "Thankyou for course online payment, You will receive a confirmation email shortly.",
              ]);
            } else {
              return response()->json([
                "success" => false,
                "message" => $response->message,
              ], 200);
            }
          } else {
            return response()->json([
              "success" => false,
              "message" => $payment_method_response->message,
            ], 200);
          }
        } else {
          return response()->json([
            "success" => false,
            "message" => $customer_response->message,
          ], 200);
        }
      } else {
        if ($request->ajax()) {
          return response()->json([
            "success" => false,
            "message" => "Your session has expired please refresh your page.",
          ], 200);
        } else {
          return response()->json([
            'redirect' => 1,
            'url' => route('theme-course-payment-personal-detail', [$this->data['course']->id, Str::slug($this->data['course']->title, '-')])
          ]);
        }
      }
    } catch (\Exception $e) {
      if ($request->ajax()) {
        return response()->json([
          "success" => false,
          "message" => $e->getMessage(),
        ], 200);
      } else {
        return abort(404);
      }
    }
  }

  public function save_payment($course, $type, $transaction_type = NULL, $nonce = NULL)
  {
    try {
      $this->data['course'] = $course;
      if ($type == "payment") {
        $payment = new Payment();
        $payment->title = session()->get('personal-data.title');
        $payment->name = session()->get('personal-data.name');
        $payment->email = session()->get('personal-data.email');
        $payment->phone = session()->get('personal-data.phone');
        $payment->mobile = session()->get('personal-data.mobile');
        $payment->address = session()->get('personal-data.address');
        $payment->organization = session()->get('personal-data.organization');
        $payment->comment = session()->get('personal-data.comment');
        $payment->nonce = $nonce;
        $payment->transaction_type = implode(" ", preg_split('/(?=[A-Z])/', $transaction_type));
        $payment->status = 'payment';
        $payment->price = $course->price;
        $payment->course_id = $course->id;
        $payment->save();

        /*Admin Email*/
        $this->data['subject'] = "WORKSHOP REGISTRATION ONLINE PAID";
        $this->data['view'] = 'emails.course-payment';
        $this->data['type'] = 'admin';
        Mail::to(config("setting.cc_email"))->bcc(["waqas@astutesol.com"])->send(new Email($this->data));

        /*User Email*/
        $this->data['subject'] = "WORKSHOP REGISTRATION CONFIRMATION";
        $this->data['view'] = 'emails.course-payment';
        $this->data['type'] = 'user';
        Mail::to(session()->get('personal-data.email'))->bcc(["waqas@astutesol.com"])->send(new Email($this->data));

        //forget personal form data from session
        session()->forget('personal-data');
      } else if ($type == "request" || $type == "bankcheck") {

        $payment = new Payment();
        $payment->title = request()->title;
        $payment->name = request()->name;
        $payment->email = request()->email;
        $payment->phone = request()->phone;
        $payment->mobile = request()->mobile;
        $payment->address = request()->address;
        $payment->organization = request()->organization;
        $payment->comment = request()->comment;
        $payment->transaction_type = $transaction_type;
        $payment->status = $type;
        $payment->price = $course->price;
        $payment->course_id = $course->id;
        $payment->save();

        if ($type == "bankcheck") {
          /*Admin Email*/
          $this->data['subject'] = "WORKSHOP REGISTRATION VIA BANK CHECK";
          $this->data['view'] = 'emails.course-bank-check';
          $this->data['type'] = 'admin';
          Mail::to(config("setting.cc_email"))->bcc(["waqas@astutesol.com"])->send(new Email($this->data));

          /*User Email*/
          $this->data['subject'] = "WORKSHOP REGISTRATION CONFIRMATION";
          $this->data['view'] = 'emails.course-bank-check';
          $this->data['type'] = 'user';
          Mail::to($payment->email)->bcc(["waqas@astutesol.com"])->send(new Email($this->data));
        } else {
          $this->data['subject'] = "WORKSHOP INQUIRY";
          $this->data['view'] = 'emails.course-request';
          $this->data['type'] = 'admin';
          Mail::to(config("setting.cc_email"))->bcc(["waqas@astutesol.com"])->send(new Email($this->data));
        }
      }
    } catch (\Exception $e) {
      if (request()->ajax()) {
        return response()->json([
          "success" => false,
          "message" => $e->getMessage(),
        ], 200);
      } else {
        return abort(404);
      }
    }
  }

  public function coupon(Request $request)
  {
    try {
      $query = CourseModel::leftJoin('course_date', function ($join) {
        $join->on('course.id', '=', 'course_date.course_id')->where('course_date.active', 1);
      });
      $query->where('course.id', $request->course_id);
      $this->data['course'] = $query->select("course.*")->first();
      //$query = Coupon::join('coupon_course', 'coupon.id', '=', 'coupon_course.coupon_id')->where('coupon.code', $request->code);	  
	  
	  //query_check_if_one_cource
	  $query_cource = Coupon::join('coupon_course', 'coupon.id', '=', 'coupon_course.coupon_id')->where('coupon.code', $request->code)->first();
	  if($query_cource)
	  {
		  $query = Coupon::join('coupon_course', 'coupon.id', '=', 'coupon_course.coupon_id')->where('coupon.code', $request->code);
		  $query->where('coupon_course.course_id', $this->data['course']->id);
	  }
	  else{
		$query = Coupon::where('coupon.code', $request->code);        
	  }
	  
      
	  //$query->where('coupon.start_date', '<=', Carbon::now()->toDateString());	  
	  $query->where(function ($query) {
			$query->where('coupon.start_date', '<=', Carbon::now()->toDateString())
				  ->orWhereNull('coupon.start_date');
	  });
	  	  
      //$query->where('coupon.end_date', '>=', Carbon::now()->toDateString());
	  $query->where(function ($query) {
			$query->where('coupon.end_date', '>=', Carbon::now()->toDateString())
				  ->orWhereNull('coupon.end_date');
	  });	  
	  
      $query->where('coupon.type', 1);
      $query->orderBy('coupon.created_at', 'DESC');
      $coupon = $query->first();
      if ($coupon) {
        session()->put('course_coupon_percentage' . $this->data['course']->id, $coupon->percentage);
        session()->flash('message', "Congratulations! You've received a $" . round($this->data['course']->price * ($coupon->percentage / 100)) . " discount!");
        return response()->json([
          "success" => true,
          "reload" => 1,
          "url" => route('theme-course-detail', [$this->data['course']->id, Str::slug($this->data['course']->title, '-')]),
        ], 200);
      } else {
        return response()->json([
          "success" => false,
          "message" => 'The coupon code is invalid!',
        ], 200);
      }
    } catch (\Exception $e) {
      if ($request->ajax()) {
        return response()->json([
          "success" => false,
          "message" => $e->getMessage(),
        ], 200);
      } else {
        return abort(404);
      }
    }
  }
}
