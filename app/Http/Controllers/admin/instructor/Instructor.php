<?php
namespace App\Http\Controllers\admin\instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\admin\Controller;
use App\Instructor as InstructorModel;
use View, Validator, File;

class Instructor extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(Request $request)
    {
        return View::make('admin.instructor.index')->with('data', $this->data);
    }
    public function listing(Request $request)
    {
        if ($request->isMethod('post')) {
            $jtStartIndex = $_REQUEST['jtStartIndex'];
            $jtPageSize = $_REQUEST['jtPageSize'];
            $query = InstructorModel::query();
            if (!empty($request->name)) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }
            if (!empty($_REQUEST['jtSorting']) && $_REQUEST['jtSorting'] != "undefined") {
                $jtSorting = explode(' ', $_REQUEST['jtSorting']);
                $query = $query->orderBy($jtSorting[0], $jtSorting[1]);
            }
            $query->orderBy('created_at', 'DESC');
            $dataCount = $query->count();
            $query->limit($jtPageSize)->offset($jtStartIndex);
            $data = $query->get();
            $this->response['Result'] = "OK";
            $this->response['TotalRecordCount'] = $dataCount;
            $this->response['Records'] = $data;
            return json_encode($this->response);
        }
    }
    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            $attributes = array(
                'name' => 'Name'
            );
            $validator = Validator::make($request->all(), [
                'name' => 'bail|required'
            ], [], $attributes);
            if ($validator->passes()) {
                $record = InstructorModel::where('id', $request->id)
                    ->first();
                $record->name = $request->name;
                $record->bio = $request->bio;
                $record->image = $request->image;
                $record->save();

                $this->response['Result'] = "OK";
                return json_encode($this->response);
            }
        }
        $this->response['Result'] = "ERROR";
        $this->response['Message'] = $validator->errors()
            ->all();
        return json_encode($this->response);
    }
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $attributes = array(
                'name' => 'Name'
            );
            $validator = Validator::make($request->all(), [
                'name' => 'bail|required'
            ], [], $attributes);
            if ($validator->passes()) {
                
                $record = new InstructorModel();
                $record->name = $request->name;
                $record->bio = $request->bio;
                $record->image = $request->image;
                $record->save();

                $this->response['Result'] = "OK";
                $this->response['Record'] = $record;
                return json_encode($this->response);
            }
        }
        $this->response['Result'] = "ERROR";
        $this->response['Message'] = set_error_delimeter($validator->errors()
            ->all());
        return json_encode($this->response);
    }
    public function delete(Request $request)
    {
        if ($request->isMethod('post')) {
            $record = InstructorModel::where('id', $request->id)
                ->first();
            if ($record->delete()) {

                if (File::isFile('public/assets/admin/images/instructor/' . $record->image)) {
                    \File::delete('public/assets/admin/images/instructor/' . $record->image);
                }

                $this->response['Result'] = "OK";
                return json_encode($this->response);
            }
        }
    }
    public function instructors(Request $request)
	{
		$result = InstructorModel::all();
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
