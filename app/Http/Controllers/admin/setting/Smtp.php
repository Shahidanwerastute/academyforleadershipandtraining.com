<?php
namespace App\Http\Controllers\admin\setting;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\Controller;
use App\SmtpSetting;
use DB, View, Validator, Route, Auth, File, Carbon\Carbon, Mail, URL, Excel;
class Smtp extends Controller
{
    public function __construct()
	{
		parent::__construct();
	}
	public function index(Request $request)
	{
		$this->data['setting'] = SmtpSetting::first();
		if ($request->isMethod('post')) 
		{  
			$attributes = array(
				'host' => 'Host',
				'type' => 'Encryption Type',
				'port' => 'Port',
				'username' => 'Username',
				'password' => 'Password',
				'email' => 'Email',
				'from_address' => 'From Address',
				'from_name' => 'From Name',
			);
			
			$validator = Validator::make($request->all(), [
				'host' => 'bail|required',
				'type' => 'bail|required',
				'port' => 'bail|required',
				'username' => 'bail|required',
				//'password' => 'bail|required',
				'email' => 'bail|required',
				'from_address' => 'bail|required',
				'from_name' => 'bail|required',
			], [], $attributes);
			
			if ($validator->fails()) 
			{	
				return redirect()->back()->withInput()->withErrors($validator);
			} 
			else 
			{
				$this->data['setting']->host = $request->host;
				$this->data['setting']->type = $request->type;
				$this->data['setting']->port = $request->port;
				$this->data['setting']->username = $request->username;
				if($request->password) $this->data['setting']->password = $request->password;
				$this->data['setting']->email = $request->email;
				$this->data['setting']->from_address = $request->from_address;
				$this->data['setting']->from_name = $request->from_name;
				$this->data['setting']->save();
				return redirect()->back()
					->with('message',  'Updated Successfully.'); 
			}
		} 
		return View::make('admin.setting.smtp')->with('data', $this->data);
	}
}
