<?php
namespace App\Http\Controllers\admin\permission;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\Controller;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission as PermissionModel;
use DB, View, Validator, Route, Auth, File, Carbon\Carbon, Mail, URL, Excel,  Session;
class Permission extends Controller {
    public function __construct() {
		parent::__construct(); 
    }
	public function index() {
		return View::make('admin.permission.index')->with('data', $this->data);
    }
    public function listing(Request $request)
	{
		if ($request->isMethod('post')) 
		{  
			$jtStartIndex = $_REQUEST['jtStartIndex'];
			$jtPageSize   = $_REQUEST['jtPageSize'];
			$query        = PermissionModel::query();
			if (!empty($request->name)) {	
				$query->where('name', 'like', '%' . $request->name . '%');
			}
			if(!empty($_REQUEST['jtSorting']) && $_REQUEST['jtSorting'] != "undefined") {
				$jtSorting   = explode(' ', $_REQUEST['jtSorting']);
				$query = $query->orderBy($jtSorting[0], $jtSorting[1]);
			}
			$query->orderBy('created_at', 'DESC');
			$dataCount = $query->count();
			$query->limit($jtPageSize)->offset($jtStartIndex);
			$data = $query->get();
			$this->response['Result']           = "OK";
			$this->response['TotalRecordCount'] = $dataCount;
			$this->response['Records']          = $data;
			return json_encode($this->response);
		} 
	}
	public function create(Request $request)
	{
		if ($request->isMethod('post')) 
		{
			$attributes = array(
				'name' => 'Name'
			);
			$validator = Validator::make($request->all(), [
				'name' => 'bail|required|max:40|unique:permissions,name'
			], [], $attributes);
			
			if ($validator->passes())  
			{
				$permission = new PermissionModel();
				$permission->name = $request->name;
				$roles = $request->roles;
				$permission->save();
				if (!empty($request->roles)) { //If one or more role is selected
					foreach ($roles as $role) {
						$r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record
						$permission = PermissionModel::where('name', '=', $request->name)->first(); //Match input //permission to db record
						$r->givePermissionTo($permission);
					}
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
		if ($request->isMethod('post')) 
		{
			$attributes = array(
				'name' => 'Name'
			);
			$validator = Validator::make($request->all(), [
				'name' => 'required|max:40|unique:permissions,name,'.$request->id.',id',
			], [], $attributes);
			if ($validator->passes()) 
			{
				$permission = PermissionModel::findOrFail($request->id);
				$input = $request->all();
				$permission->fill($input)->save();
				
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
			$permission = PermissionModel::findOrFail($request->id);
			if($permission->delete())
			{	
				$this->response['Result'] = "OK";
				return json_encode($this->response);
			} 
		} 
	}
	public function permissions(Request $request)
	{	
		$result = PermissionModel::all();
		$rows[] = array("DisplayText"=>"", "Value"=>"");
		foreach ($result as $key => $value) {
			$rows[$key+1]['DisplayText'] = $value->name;
            $rows[$key+1]['Value'] = $value->id;
        }
		$this->response['Options'] = $rows;
        $this->response['Result'] = "OK";
		return json_encode($this->response);
	}
}
