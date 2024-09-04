<?php
namespace App\Http\Controllers\admin\coupon;

use Illuminate\Http\Request;
use App\Http\Controllers\admin\Controller;
use App\Coupon as CouponModel;
use App\CouponCourse;
use DB, View, Validator, Route, Auth, File, Carbon\Carbon, Mail, URL, Excel;

class Coupon extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $jtStartIndex = $_REQUEST['jtStartIndex'];
            $jtPageSize = $_REQUEST['jtPageSize'];
            if ($request->isMethod('post') && $request->action == "coupon_courses") {
                $query = CouponCourse::join('course', function ($join) {
                    $join->on('course.id', '=', 'coupon_course.course_id');
                });
                $query->where('coupon_course.coupon_id', $request->coupon_id);
                $query->select('course.*', 'coupon_course.*');
            } else {
                $query = CouponModel::query();
                if (!empty($request->name)) {
                    $query->where('code', 'like', '%' . $request->name . '%');
                }
            }
            if (!empty($_REQUEST['jtSorting']) && $_REQUEST['jtSorting'] != "undefined") {
                $jtSorting = explode(' ', $_REQUEST['jtSorting']);
                $query = $query->orderBy($jtSorting[0], $jtSorting[1]);
            }
            $dataCount = $query->count();
            $query->limit($jtPageSize)->offset($jtStartIndex);
            $data = $query->get();
            $this->response['Result'] = "OK";
            $this->response['TotalRecordCount'] = $dataCount;
            $this->response['Records'] = $data;
            return json_encode($this->response);
        } else {
            return View::make('admin.coupon.index')->with('data', $this->data);
        }
    }
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->action == "coupon_course_create") {
                $attributes = array(
                    'course_id' => 'Course',
                    'coupon_id' => 'Coupon',
                );
                $validator = Validator::make($request->all(), [
                    'course_id' => 'bail|required|unique:coupon_course,course_id,null, null,coupon_id,' . $request->coupon_id,
                    'coupon_id' => 'bail|required',
                ], [], $attributes);
                if ($validator->passes()) {
                    /*Insert Course to Coupon*/
                    $record = new CouponCourse();
                    $record->coupon_id = $request->coupon_id;
                    $record->course_id     = $request->course_id;
                    $record->save();
                    $this->json_array['Result'] = "OK";
                    $this->json_array['Record'] = $record;
                    return json_encode($this->json_array);
                }
            } else {
                $attributes = array('code' => 'Coupon Code', 'start_date' => 'Start Date', 'end_date' => 'End Date', 'percentage' => 'Percentage', 'type' => 'Type');
                //$validator = Validator::make($request->all(), ['code' => 'bail|required|unique:coupon,code', 'start_date' => 'bail|required|date|after:yesterday', 'end_date' => 'bail|required|date|after:start_date', 'percentage' => 'bail|required|numeric|min:0|max:100', 'type' => 'bail|required'], [], $attributes);
                $validator = Validator::make($request->all(), ['code' => 'bail|required|unique:coupon,code', 'percentage' => 'bail|required|numeric|min:0|max:100', 'type' => 'bail|required'], [], $attributes);
                if ($validator->passes()) {
                    $record = new CouponModel();
                    $record->code = $request->code;
                    $record->percentage = $request->percentage;
                    $record->type = $request->type;				
					
					$record->start_date = null;
					$record->end_date = null;
					if($request->start_date!="")
						$record->start_date = Carbon::parse($request->start_date)->toDateTimeString();					
					if($request->end_date!="")
						$record->end_date = Carbon::parse($request->end_date)->toDateTimeString();
					
					
                    $record->save();
                    $this->response['Result'] = "OK";
                    $this->response['Record'] = $record;
                    return json_encode($this->response);
                }
            }
        }
        $this->response['Result'] = "ERROR";
        $this->response['Message'] = set_error_delimeter($validator->errors()->all());
        return json_encode($this->response);
    }
    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->action == "coupon_course_update") {
                $attributes = array(
                    'course_id' => 'Course',
                    'coupon_id' => 'Coupon',
                );
                $validator = Validator::make($request->all(), [
                    'course_id' => 'bail|required|unique:coupon_course,course_id,' . $request->id . ',id,coupon_id,' . $request->coupon_id,
                    'coupon_id' => 'bail|required',
                ], [], $attributes);
                if ($validator->passes()) {
                    /*Update Coupon Course*/
                    $record = CouponCourse::where('id', $request->id)->where('coupon_id', $request->coupon_id)->first();
                    $record->course_id     = $request->course_id;
                    $record->save();
                    $this->json_array['Result'] = "OK";
                    return json_encode($this->json_array);
                }
            } else {
                $attributes = array('code' => 'Coupon Code', 'start_date' => 'Start Date', 'end_date' => 'End Date', 'percentage' => 'Percentage', 'type' => 'Type');
                //$validator = Validator::make($request->all(), ['start_date' => 'bail|required|date|after:yesterday', 'end_date' => 'bail|required|date|after:start_date', 'code' => 'bail|required|unique:coupon,code,' . $request->id . ',id', 'percentage' => 'bail|required|numeric|min:0|max:100', 'type' => 'bail|required'], [], $attributes);
				$validator = Validator::make($request->all(), ['code' => 'bail|required|unique:coupon,code,' . $request->id . ',id', 'percentage' => 'bail|required|numeric|min:0|max:100', 'type' => 'bail|required'], [], $attributes);
                if ($validator->passes()) {
                    $record = CouponModel::where('id', $request->id)->first();
                    $record->code = $request->code;
                    $record->percentage = $request->percentage;
                    $record->type = $request->type;
					
					$record->start_date = null;
					$record->end_date = null;
					if($request->start_date!="")
						$record->start_date = Carbon::parse($request->start_date)->toDateTimeString();					
					if($request->end_date!="")
						$record->end_date = Carbon::parse($request->end_date)->toDateTimeString();
					
                    $record->save();
                    $this->response['Result'] = "OK";
                    return json_encode($this->response);
                }
            }
            $this->response['Result'] = "ERROR";
            $this->response['Message'] = $validator->errors()->all();
            return json_encode($this->response);
        }
    }
    public function delete(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->isMethod('post') && $request->action == "coupon_course_delete") {
                $record = CouponCourse::where('id', $request->id)->where('coupon_id', $request->coupon_id)->first();
            } else {
                $record = CouponModel::where('id', $request->id)->first();
            }
            if ($record->delete()) {
                $this->response['Result'] = "OK";
            }
            return json_encode($this->response);
        }
    }
}
