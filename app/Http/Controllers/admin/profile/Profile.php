<?php
namespace App\Http\Controllers\admin\profile;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\Controller;
use DB, View, Validator, Route, Auth, File;
class Profile extends Controller
{
    public function __construct()
	{
		parent::__construct();
	}
	public function edit(Request $request)
	{
		if ($request->isMethod('post') && $request->ajax()) 
		{
			$user = Auth::user();
			$attributes = array(
				'first_name' => 'First Name',
				'last_name' => 'Last Name',
				'email' => 'Email',
				'image' => 'Image',
			);
			$messages = [
				'email.confirmed_email_exist'    => 'The Email has already been taken.'
			];
			$validator = Validator::make($request->all(), [
				'first_name' => 'bail|required|min:3|max:25|valid_profile_username',
				'last_name' => 'bail|required|min:3|max:25|valid_profile_username',
				'email' => 'bail|required|email|verification_email|unique:users,email,'.$user->id.',id',
				'image' => 'bail|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
			], $messages, $attributes);
			
			if ($validator->passes()) {
				if($request->image)
				{
					if(File::isFile('public/assets/admin/images/profile/'.$user->image)){
						\File::delete('public/assets/admin/images/profile/'.$user->image);
					}
					$user->image = upload_image(array(
						"file" => $request->image,
						"dir" => 'public/assets/admin/images/profile/',
						"name" => time().'.'.$request->image->getClientOriginalExtension(),
						"width" => 100,
						"height" => 100,
					));
				}
				$user->first_name = $request->first_name; 
				$user->last_name = $request->last_name;
				$user->email = $request->email;
				$user->address = $request->address;
				$user->mobile = $request->mobile;
				$user->save();
				return response()->json([
					'success'=>1,
					'message'=>'Profile Updated Successfully.',
				]);
			}
			
			return response()->json([
				'success'=>0,
				'error'=>$validator->errors(),
			]);
		}
		
		return View::make('admin.profile.edit')->with('data', $this->data);
	}
	public function credentials(Request $request)
	{
		if ($request->isMethod('post') && $request->ajax()) 
		{
			$messages = [
				'old_password.old_password'    => 'Please enter valid old password!'
			];
			$validator = Validator::make($request->all(), [
				'old_password' => 'bail|required|old_password',
				'password' => 'bail|required|min:6|confirmed',
			], $messages, []);
			
			if ($validator->fails()) 
			{	
				return response()->json([
					'success'=>0,
					'error'=>$validator->errors(),
				]);
			} 
			else 
			{
				$user = Auth::user();
				$user->password = bcrypt($request->password);	
				$user->save();
				
				return response()->json([
					'success'=>1,
					'message'=>'Password Updated Successfully.',
				]);
			}
		}
	}
}
