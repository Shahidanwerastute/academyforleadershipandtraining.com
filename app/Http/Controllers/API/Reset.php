<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Password;
use Auth, Validator;

class Reset extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		parent::__construct();
    }
	public function showResetForm(Request $request, $token = null) {
		return view('customer.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        )->withErrors([]);
    }
	public function reset(Request $request)
    {
		$attribute = array(
			'token' => trans('language.token'),
            'email' => trans('language.email_or_mobile'),
            'password' => trans('language.password'),
		);
		$validator = Validator::make($request->all(), [
			'token' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:6',
		], [], $attribute);
        if ($validator->fails()) {
			return redirect()->back()->withInput()->with('error', implode(' ', $validator->errors()->all()));
        }
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );
        return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($response)
                    : $this->sendResetFailedResponse($request, $response);
    }
	protected function sendResetResponse($response)
    {
        return redirect()->back()->with('message', trans($response));
    }
	protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);
    }
	protected function credentials(Request $request)
    {
		$field = filter_var($request->email, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'p_mobile';
        return array(
			$field => $request->email,
			'password' => $request->password,
			'password_confirmation' => $request->password,
			'token' => $request->token
        );
    }
    //defining which guard to use in our case, it's the customer guard
    protected function guard()
    {
        return Auth::guard('customer');
    }
    //defining our password broker function
    protected function broker() 
	{
        return Password::broker('customer');
    }
}