<?php
namespace App\Http\Controllers\admin\employee;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\Controller;
use App\Employee as EmployeeModel;
use App\Mail\Email;
use DB, View, Validator, Route, Auth, File, Carbon\Carbon, Mail, URL, Excel;
class Employee extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index(Request $request) {
        return View::make('admin.employee.index')->with('data', $this->data);
    }
    public function listing(Request $request) {
        if ($request->isMethod('post')) {
            $jtStartIndex = $_REQUEST['jtStartIndex'];
            $jtPageSize = $_REQUEST['jtPageSize'];
            $query = EmployeeModel::where('group_id', $this->data['group_info']->id);
            if (!empty($request->name)) {
                $query->where('first_name', 'like', '%' . $request->name . '%');
                $query->orWhere('last_name', 'like', '%' . $request->name . '%');
            }
            if (!empty($_REQUEST['jtSorting']) && $_REQUEST['jtSorting'] != "undefined") {
                $jtSorting = explode(' ', $_REQUEST['jtSorting']);
                $query = $query->orderBy($jtSorting[0], $jtSorting[1]);
            } else {
                $query = $query->orderBy('id', 'DESC');
            }
            $dataCount = $query->count();
            $query->limit($jtPageSize)->offset($jtStartIndex);
            $data = $query->get();
            $this->response['Result'] = "OK";
            $this->response['TotalRecordCount'] = $dataCount;
            $this->response['Records'] = $data;
            return json_encode($this->response);
        }
    }
    public function create(Request $request) {
        if ($request->isMethod('post')) {
            $attributes = array('email' => 'Email', 'first_name' => 'First Name', 'last_name' => 'Last Name', 'mobile' => 'Mobile');
            $validator = Validator::make($request->all(), [
					//'email' => 'bail|required|unique:employee,email,null,null,group_id,'.$this->data['group_info']->id, 
					'first_name' => 'bail|required', 
					'last_name' => 'bail|required',
					'email' => 'bail|required', 
				], [], $attributes);
            if ($validator->passes()) {
                $record = new EmployeeModel();
                $record->email = $request->email;
                $record->first_name = $request->first_name;
                $record->last_name = $request->last_name;
                $record->mobile = $request->mobile;
                $record->code = time() . str_random(5);
                $record->group_id = $this->data['group_info']->id;
                $record->save();
                /*Send Email*/
                $this->data['view'] = 'emails.invitation';
                $this->data['user'] = $record;
                $this->data['subject'] = "Invitation | " . config('app.name');
                //Mail::to($record->email)->send(new Email($this->data)); 
                $this->response['Result'] = "OK";
                $this->response['Record'] = $record;
                return json_encode($this->response);
            }
        }
        $this->response['Result'] = "ERROR";
        $this->response['Message'] = set_error_delimeter($validator->errors()->all());
        return json_encode($this->response);
    }
    public function update(Request $request) {
        if ($request->isMethod('post')) {
            $attributes = array('email' => 'Email', 'first_name' => 'First Name', 'last_name' => 'Last Name', 'mobile' => 'Mobile');
            $validator = Validator::make($request->all(), [
					'first_name' => 'bail|required', 
					'last_name' => 'bail|required', 
					//'email' => 'bail|required|unique:employee,email,' . $request->id . ',id,group_id,'.$this->data['group_info']->id],
					'email' => 'bail|required',
				], [], $attributes);
            if ($validator->passes()) {
                $record = EmployeeModel::where('id', $request->id)->where('group_id', $this->data['group_info']->id)->first();
                $record->email = $request->email;
                $record->first_name = $request->first_name;
                $record->last_name = $request->last_name;
                $record->mobile = $request->mobile;
                $record->save();
                $this->response['Result'] = "OK";
                return json_encode($this->response);
            }
        }
        $this->response['Result'] = "ERROR";
        $this->response['Message'] = set_error_delimeter($validator->errors()->all());
        return json_encode($this->response);
    }
    public function delete(Request $request) {
        if ($request->isMethod('post')) {
            $record = EmployeeModel::where('id', $request->id)->where('group_id', $this->data['group_info']->id)->first();
            if ($record->delete()) {
                $this->response['Result'] = "OK";
            }
            return json_encode($this->response);
        }
    }
    public function invitation(Request $request) {
        if ($request->isMethod('post')) {
            $record = EmployeeModel::where('id', $request->id)->where('group_id', $this->data['group_info']->id)->first();
            $record->is_email = 1;
            $record->save();
            /*Send Email*/
            $this->data['view'] = 'emails.invitation';
            $this->data['user'] = $record;
            $this->data['subject'] = "Invitation | " . config('app.name');
            Mail::to($record->email)->send(new Email($this->data));
        }
    }
    public function invitations(Request $request) {
        if ($request->isMethod('post')) {
            $records = EmployeeModel::where('is_email', 0)->where('group_id', $this->data['group_info']->id)->get();
            foreach ($records as $row) {
                $response = EmployeeModel::where('group_id', $this->data['group_info']->id)->where('id', $row->id)->update(['is_email' => 1]);
                /*Send Email*/
                $this->data['view'] = 'emails.invitation';
                $this->data['user'] = $row;
                $this->data['subject'] = "Invitation | " . config('app.name');
                Mail::to($row->email)->send(new Email($this->data));
            }
        }
    }
    public function import(Request $request) {
        if ($request->file) {
            $fields = json_decode($request->array);
            $path = $request->file->getRealPath();
            $data = Excel::load($path, function ($reader) {
            })->get();
            if (!empty($data) && $data->count()) {
                $data = $data->toArray();
                for ($i = 0;$i < count($data);$i++) {
                    $dataImported[] = $data[$i];
                }
            }
            foreach ($dataImported as $row) {
                if ($row['first_name'] && $row['last_name'] && $row['email']) {
                    $count = EmployeeModel::where('email', $row['email'])->where('group_id', $this->data['group_info']->id)->count();
                    if ($count == 0) EmployeeModel::create(["email" => $row['email'], "first_name" => $row['first_name'], "last_name" => $row['last_name'], "mobile" => $row['mobileoptional'], "code" => time() . str_random(10), "group_id" => $this->data['group_info']->id, ]);
                }
            }
        }
    }
}
