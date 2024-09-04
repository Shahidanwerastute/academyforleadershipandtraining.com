<?php
namespace App\Http\Controllers\admin\user;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\Controller;
use App\User as UserModel;
use App\Mail\Email;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Libraries\Upload;
use DB, View, Validator, Route, Auth, File, Carbon\Carbon, Mail, URL, Excel;
class User extends Controller
{	
    public function __construct()
	{
		parent::__construct();
	}
	public function index(Request $request)
	{
		return View::make('admin.user.index')->with('data', $this->data);
	}
	public function listing(Request $request)
	{
		if ($request->isMethod('post')) 
		{  
			$jtStartIndex = $_REQUEST['jtStartIndex'];
			$jtPageSize   = $_REQUEST['jtPageSize'];
			$query        = UserModel::where('group_id', $this->data['group_info']->id);
			if (!empty($request->name)) {	
				$query->where('first_name', 'like', '%' . $request->name . '%');
				$query->orWhere('last_name', 'like', '%' . $request->name . '%');
			}
			if(!empty($_REQUEST['jtSorting']) && $_REQUEST['jtSorting'] != "undefined") {
				$jtSorting   = explode(' ', $_REQUEST['jtSorting']);
				$query = $query->orderBy($jtSorting[0], $jtSorting[1]);
			}
			$dataCount = $query->count();
			$query->limit($jtPageSize)->offset($jtStartIndex);
			$data = $query->get();
			$this->data['users'] = array();
			foreach($query->get() as $key => $user) {
				$this->data['users'][$key] = $user;
				$this->data['users'][$key]['roles_text'] = $user->roles()->pluck('name')->implode(',');
				$this->data['users'][$key]['roles'] = $user->roles()->pluck('role_id')->implode(',');
			}
		
			$this->response['Result']           = "OK";
			$this->response['TotalRecordCount'] = $dataCount;
			$this->response['Records']          = $this->data['users'];
			return json_encode($this->response);
		} 
	}
	public function create(Request $request)
	{
		if ($request->isMethod('post')) 
		{
			$attributes = array(
				'first_name' => 'First Name',
				'last_name' => 'Last Name',
				'email' => 'Email',
				'mobile' => 'Mobile',
				'password' => 'Password',
				'roles' => 'Roles',
			);
			$validator = Validator::make($request->all(), [
				'first_name' => 'bail|required|min:3',
				'last_name' => 'bail|required|min:3',
				'email' => 'bail|required|unique:users,email',
				'mobile' => 'bail|required',
				'password' => 'bail|required|min:6',
				'roles' => 'bail|required',
			], [], $attributes);
			
			if ($validator->passes())  
			{
				/*Profile Image Upload*/
				/* $obj = new Upload();
				$image = $obj->defaultAvatar($request->first_name.' '.$request->last_name,'public/assets/admin/images/profile/', 25, 25);
				$obj->uploadFile(3,$image,'public/assets/admin/images/profile/',$image,true); */
				/*End Profile Image Upload*/
				$user =  new UserModel();
				$user->first_name = $request->first_name; 
				$user->last_name = $request->last_name; 
				$user->email = $request->email;
				$user->password = bcrypt($request->password);
				$user->mobile = $request->mobile;
				$user->address = $request->address;
				$user->group_id = $this->data['group_info']->id;
				//$user->image = $image;
				$user->save();
				$roles = $request->roles; //Retrieving the roles field
				//Checking if a role was selected
				if (isset($roles)) {
					foreach ($roles as $role) {
						$role_r = Role::where('id', '=', $role)->firstOrFail();            
						$user->assignRole($role_r); //Assigning role to user
					}
				} 
				
				$this->response['Result'] = "OK";
				$this->response['Record'] = $user;
				return json_encode($this->response);
			}
		} 
		$this->response['Result'] = "ERROR";
		$this->response['Message'] = set_error_delimeter($validator->errors()->all());
		return json_encode($this->response);
	}
	public function update(Request $request)
	{
		if ($request->isMethod('post')) 
		{
			$attributes = array(
				'first_name' => 'First Name',
				'last_name' => 'Last Name',
				'email' => 'Email',
				'mobile' => 'Mobile',
				'password' => 'Password',
				'roles' => 'Roles',
			);
			$validator = Validator::make($request->all(), [
				'first_name' => 'bail|required|min:3',
				'last_name' => 'bail|required|min:3',
				'email' => 'bail|required|unique:users,email,'.$request->id.',id',
				'mobile' => 'bail|required',
				'password' => ($request->password ? 'bail|min:6' : ''),
				'roles' => 'bail|required',
			], [], $attributes);
			if ($validator->passes()) 
			{
				$user = UserModel::where('id', $request->id)
					->where('group_id', $this->data['group_info']->id)
					->first();
				$user->first_name = $request->first_name; 
				$user->last_name = $request->last_name; 
				$user->email = $request->email;
				if($request->password) $user->password = bcrypt($request->password);
				$user->mobile = $request->mobile;
				$user->address = $request->address;
				$user->save(); 
				if(!$user->hasRole('administrator'))
				{
					$roles = $request->roles; //Retreive all roles
					if (isset($roles)) {        
						$user->roles()->sync($roles);  //If one or more role is selected associate user to roles          
					}        
					else {
						$user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
					}
				}
				$this->response['Result'] = "OK";
				return json_encode($this->response);
			}		
		} 
		$this->response['Result'] = "ERROR";
		$this->response['Message'] = $validator->errors()->all();
		return json_encode($this->response);
	}
	public function delete(Request $request)
	{
		if ($request->isMethod('post')) 
		{
			$user = UserModel::where('id', $request->id)
				->where('group_id', $this->data['group_info']->id)
				->first(); 
			if(!$user->hasRole('administrator'))
			{
				if($user->delete())
				{	
					$this->response['Result'] = "OK";		
				} 
			} else {
				$this->response['Result'] = "OK";
				$this->response['message'] = "You can't delete Administrator!";
			}
			return json_encode($this->response);
		} 
	}
}
