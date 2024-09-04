<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Libraries\Functions;
use App\Libraries\Upload;
use App\Mail\Email;
use App\Customer;
use DB, Config, URL, View, Socialite, Route, Mail, Str;

class Registration extends Controller
{
    public $successStatus = 200;
	private $unique_code;
	private $confirmation_link;
	private $profile_pic;
	
	protected function validator(array $data)
    {
		$attribute = array(
		   'name' => trans('language.name'),
		   'name_en' => trans('language.name'),
		   'family_name' => trans('language.family_name'),
		   'family_name_en' => trans('language.family_name'),
		   'email' => trans('language.email'),     
		   'password' => trans('language.password'),
		   'p_mobile' => trans('language.primary_mobile'),  
		);
		$messages = [];	
        $validator = Validator::make($data, [
            'name' => 'bail|required|min:3'.(app()->getLocale() == "en" ? '|valid_profile_username' : ''),
            'family_name' => 'bail|required|min:3'.(app()->getLocale() == "en" ? '|valid_profile_username' : ''),
			'name_en' => (app()->getLocale() == "ar" ? 'bail|required|valid_profile_username|min:3' : ''),
            'family_name_en' =>  (app()->getLocale() == "ar" ? 'bail|required|valid_profile_username|min:3': ''),
            'email' => 'bail|required|email|confirmed|verification_email|unique:customer,email',
            'password' => 'bail|required|min:6|confirmed',
			'p_mobile' => 'bail|required|unique:customer,p_mobile',
        ], $messages);
		return $validator->setAttributeNames($attribute);
    }
	
	protected function create(array $data)
    {
		$this->unique_code = str_random(30);
		$dimension = '25x25';
		$fetch_data=strtoLower($dimension);
		$fetch_data=explode('x',$fetch_data);
		$width=$fetch_data[0];
		$height=$fetch_data[1];
		$obj = new Upload();
		$image = $obj->defaultAvatar($data['name'],'public/assets/customer/images/profile/',$width,$height);
		$obj->uploadFile(3,$image,'public/assets/customer/images/profile/',$image,true);
		/*Customer Created*/
		$customer = Customer::create([
            'name' => n2e($data['name']),
            'family_name' => n2e($data['family_name']),
			'name_en' => n2e($data['name_en']),
            'family_name_en' => n2e($data['family_name_en']),
            'email' => n2e($data['email']),
			'image' => n2e($image),
			'password' => n2e(bcrypt($data['password'])),
			'p_mobile' => convert_to_english(n2e($data['p_mobile'])),
			's_mobile' => convert_to_english(n2e($data['s_mobile'])),
			'latitude' => n2e($data['latitude']),
			'longitude' => n2e($data['longitude']),
			'address' => n2e($data['address']),
			'type' => "0",
            'confirmation_code' => n2e($this->unique_code)
        ]);
		
		/*Customer Payment*/
		$customer->check_payment();
		
		/*Send Email*/
		$this->data['user'] = $data;
		$this->data['view'] = 'emails.register';
		$this->data['subject'] = "Registration | ".config('app.name');
		$this->data['heading'] = "Thank You, It's our honor to serve you!";
		Mail::to($data['email'])->send(new Email($this->data));
		$this->data['heading'] = "A new user is registered with the following details: ".$data['name']." ".$data['family_name'].", ".$data['p_mobile'].", ".$data['email'];
		Mail::to(DB::table('smtp_setting')->value('email'))->send(new Email($this->data));
		
		return $customer; 
    }
	
	public function postRegister(Request $request)
	{
		return $this->register($request);
	}	
	
	public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
			return response()->json([
				'success'=> 0,
				'message'=> implode(' ', $validator->errors()->all())
			], $this->successStatus);
        }
		$record = $this->create($request->all());
        return response()->json([
			'success'=> 1,
			'name' => $record->name.' '.$record->family_name,
			'type' => $record->type,
			'customer_number' => ($record->customer_number ? $record->customer_number : ''),
			'message'=> trans('language.register_success'),
			'token'=> $record->createToken(config('app.name'))->accessToken,
		], $this->successStatus); 	
    }
}