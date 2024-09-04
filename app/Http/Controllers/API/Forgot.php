<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password, Validator;

class Forgot extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

	public $successStatus = 200;
	
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		parent::__construct();
    }
	protected function validator(array $data)
    {
		$attribute = array(
            'email' => trans('language.email_or_mobile')
		);
		$messages = [];	
        $validator = Validator::make($data, [
            'email' => 'required'
        ], $messages);
		return $validator->setAttributeNames($attribute);
    }
	public function sendResetLinkEmail(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
			return response()->json([
				'success' => 0,
				'message' => implode(' ', $validator->errors()->all()),
			], $this->successStatus);  
        }
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
		$field = filter_var($request->email, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'p_mobile';
        $response = $this->broker()->sendResetLink(
            [$field => $request->email]
        );
        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }
	protected function sendResetLinkResponse($response)
    {
		return response()->json([
			'success' => 1,
			'message' => trans($response),
		], $this->successStatus);
    }
	protected function sendResetLinkFailedResponse(Request $request, $response)
    {
		return response()->json([
			'success' => 0,
			'message' => trans($response),
		], $this->successStatus);
    }
    //defining which password broker to use, in our case its the customer
    protected function broker() {
        return Password::broker('customer');
    }
}