<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class Authentication extends Controller
{

    public $successStatus = 200;

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
	 
	protected function validator(array $data)
    {
		$attribute = array(
		   $this->username() => (filter_var($data['email'], FILTER_VALIDATE_EMAIL) ? trans('language.email') : trans('language.customer_id')),            
		   'password' => trans('language.password') 
		);
		$messages = [];	
		$data[$this->username()] = $data['email'];
        $validator = Validator::make($data, [
            $this->username() => 'required|string|exists:customer,'.$this->username(),
            'password' => 'required|string'
        ], $messages);
		return $validator->setAttributeNames($attribute);
    }
	
	protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }
		return response()->json([
			'success' => 0,
			'message' => implode(' ', $errors),
		], $this->successStatus);
    }
	
	public function username()
    {
        return (filter_var(request()->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'customer_number');
    }
	
	public function login(Request $request) {
		$validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->response['success'] = 0;
			$this->response['message'] = implode(' ', $validator->errors()->all());
			return json_encode($this->response);
			exit;
        }
        //attempt to login the admins in
		$field = $this->username();
		
		if(Auth::guard('customer')->attempt([$field => $request->email, 'password' => $request->password])){
            $user = Auth::guard('customer')->user();
			return response()->json([
				'success' => 1,
				'name' => $user->name.' '.$user->family_name,
				'type' => $user->type,
				'customer_number' => ($user->customer_number ? $user->customer_number : ''),
				'token' => $user->createToken(config('app.name'))->accessToken,
				'message' => trans('language.logged_message'),
			], $this->successStatus);
        } else {
			return $this->sendFailedLoginResponse($request);
        } 
    }
}