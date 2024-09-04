<?php
namespace App\Http\Controllers\admin\role;

use Illuminate\Http\Request;
use App\Http\Controllers\admin\Controller;
//Importing laravel-permission models
use Spatie\Permission\Models\Role as RoleModel;
use Spatie\Permission\Models\Permission;
use DB, View, Validator, Route, Auth, File, Carbon\Carbon, Mail, URL, Excel,  Session;

class Role extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		return View::make('admin.role.index')->with('data', $this->data);
	}
	public function listing(Request $request)
	{
		if ($request->isMethod('post')) {
				$jtStartIndex = $_REQUEST['jtStartIndex'];
				$jtPageSize   = $_REQUEST['jtPageSize'];
				$query        = RoleModel::where('name', '!=', 'administrator')
					->where('group_id', $this->data['group_info']->id);
				if (!empty($request->name)) {
					$query->where('name', 'like', '%' . $request->name . '%');
				}
				if (!empty($_REQUEST['jtSorting']) && $_REQUEST['jtSorting'] != "undefined") {
					$jtSorting   = explode(' ', $_REQUEST['jtSorting']);
					$query = $query->orderBy($jtSorting[0], $jtSorting[1]);
				}
				$query->orderBy('created_at', 'DESC');
				$dataCount = $query->count();
				$query->limit($jtPageSize)->offset($jtStartIndex);
				$this->data['roles'] = array();
				foreach ($query->get() as $key => $role) {
					$this->data['roles'][$key] = $role;
					$this->data['roles'][$key]['permission_text'] = str_replace(array('[', ']', '"'), '', $role->permissions()->pluck('name'));
					$this->data['roles'][$key]['permissions'] = str_replace(array('[', ']', '"'), '', $role->permissions()->pluck('id'));
				}
				$this->response['Result']           = "OK";
				$this->response['TotalRecordCount'] = $dataCount;
				$this->response['Records']          = $this->data['roles'];
				return json_encode($this->response);
			}
	}
	public function create(Request $request)
	{
		if ($request->isMethod('post')) {
				$attributes = array(
					'name' => 'Name',
					'permissions' => 'Permissions',
				);
				$validator = Validator::make($request->all(), [
					'name' => 'bail|required|max:50|unique:roles,name,null,null,group_id,' . $this->data['group_info']->id,
					'permissions' => 'bail|required',
				], [], $attributes);
				if ($validator->passes()) {
						$role = new RoleModel();
						$role->name = $request->name;
						$role->group_id = $this->data['group_info']->id;
						$role->save();
						$permissions = $request->permissions;
						//Looping thru selected permissions
						foreach ($permissions as $permission) {
							$p = Permission::where('id', '=', $permission)->firstOrFail();
							//Fetch the newly created role and assign permission
							$role->givePermissionTo($p);
						}
						$this->response['Result'] = "OK";
						$this->response['Record'] = $permission;
						return json_encode($this->response);
					}
			}
		$this->response['Result'] = "ERROR";
		$this->response['Message'] = set_error_delimeter($validator->errors()->all());
		return json_encode($this->response);
	}
	public function update(Request $request)
	{
		if ($request->isMethod('post')) {
				$attributes = array(
					'name' => 'Name',
					'permissions' => 'Permissions',
				);
				$validator = Validator::make($request->all(), [
					'name' => 'bail|required|max:50|unique:roles,name,' . $request->id . ',id,group_id,' . $this->data['group_info']->id,
					'permissions' => 'bail|required',
				], [], $attributes);
				if ($validator->passes()) {
						$role = RoleModel::where('id', $request->id)
							->where('group_id', $this->data['group_info']->id)
							->first();
						$input = $request->except(['permissions']);
						$permissions = $request->permissions;
						$role->fill($input)->save();
						$p_all = Permission::all(); //Get all permissions
						foreach ($p_all as $p) {
							$role->revokePermissionTo($p); //Remove all permissions associated with role
						}
						foreach ($permissions as $permission) {
							$p = Permission::where('id', '=', $permission)->firstOrFail(); //Get corresponding form //permission in db
							$role->givePermissionTo($p); //Assign permission to role
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
		if ($request->isMethod('post')) {
				$role = RoleModel::where('id', $request->id)
					->where('group_id', $this->data['group_info']->id)
					->first();
				if ($role->delete()) {
						$this->response['Result'] = "OK";
						return json_encode($this->response);
					}
			}
	}
	public function roles(Request $request)
	{
		$result = RoleModel::where('name', '!=', 'administrator')
			->where('group_id', $this->data['group_info']->id)
			->get();
		$rows[] = array("DisplayText" => "", "Value" => "");
		foreach ($result as $key => $value) {
			$rows[$key + 1]['DisplayText'] = $value->name;
			$rows[$key + 1]['Value'] = $value->id;
		}
		$this->response['Options'] = $rows;
		$this->response['Result'] = "OK";
		return json_encode($this->response);
	}
}
