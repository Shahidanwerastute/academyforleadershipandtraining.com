<?php
namespace App\Http\Controllers\admin\course;

use Illuminate\Http\Request;
use App\Http\Controllers\admin\Controller;
use App\Course as CourseModel;
use App\CourseDate;
use App\CourseVideo;
use View, Validator, File, DB;

class Course extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(Request $request)
    {
        return View::make('admin.course.index')->with('data', $this->data);
    }
    public function listing(Request $request)
    {
        $jtStartIndex = $_REQUEST['jtStartIndex'];
        $jtPageSize = $_REQUEST['jtPageSize'];
        if ($request->isMethod('post') && $request->type == "courses") {
            $query = CourseModel::query();
            if (!empty($request->name)) {
                $query->where('title', 'like', '%' . $request->name . '%');
            }
			$query->orderBy('display_order', 'ASC');
        } else if ($request->isMethod('post') && $request->type == "dates") {
            $query = CourseDate::query();
            $query->where('course_id', $request->course_id);
        } else if ($request->isMethod('post') && $request->type == "videos") {
            $query = CourseVideo::query();
            $query->where('course_id', $request->course_id);
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
    public function update(Request $request)
    {
        if ($request->isMethod('post') && $request->type == "course_update") {
            $attributes = array(
                'title' => 'Title',
                'price' => 'Price',
                'instructor_ids' => 'Instructor(s)',
                'icon' => 'Icon',
            );
            $validator = Validator::make($request->all(), [
                'title' => 'bail|required',
                'price' => ($request->price ? 'bail|numeric' : ''),
                'instructor_ids' => ($request->instructor_ids ? 'bail' : ''),
                'icon' => 'bail|required',
            ], [], $attributes);
            if ($validator->passes()) {

                $record = CourseModel::where('id', $request->id)
                    ->first();
                $record->title = $request->title;
                $record->day = $request->day;
                $record->price = $request->price;
                $record->instructor_ids = ($request->instructor_ids ? implode(',', $request->instructor_ids) : '');
                $record->description = $request->description;
                $record->outline = $request->outline;
                $record->image = $request->image;
                $record->icon = $request->icon;
                $record->short_info = $request->short_info;
                $record->location = $request->location;
                $record->save();

                $this->response['Result'] = "OK";
                $this->response['Record'] = $record;
                return json_encode($this->response);
            }
        } else if ($request->isMethod('post') && $request->type == "date_update") {
            $attributes = array(
                'start_date' => 'Start Date',
                'end_date' => 'End Date'
            );
            $validator = Validator::make($request->all(), [
                'start_date' => 'bail|required|date',
                'end_date' => 'bail|required|date|after:start_date'
            ], [], $attributes);
            if ($validator->passes()) {

                $record = CourseDate::where('id', $request->id)
                    ->first();
                $record->start_date = $request->start_date;
                $record->end_date = $request->end_date;
                $record->save();

                $this->response['Result'] = "OK";
                $this->response['Record'] = $record;
                return json_encode($this->response);
            }
        } else if ($request->isMethod('post') && $request->type == "video_update") {
            $attributes = array(
                'embed_url' => 'Youtube Embed Code',
            );
            $validator = Validator::make($request->all(), [
                'embed_url' => 'bail|required',
            ], [], $attributes);
            if ($validator->passes()) {

                $record = CourseVideo::where('id', $request->id)
                    ->first();
                $record->embed_url = $request->embed_url;
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
    public function create(Request $request)
    {
        if ($request->isMethod('post') && $request->type == "course_create") {
            $attributes = array(
                'title' => 'Title',
                'price' => 'Price',
                'instructor_ids' => 'Instructor(s)',
                'icon' => 'Icon',
            );
            $validator = Validator::make($request->all(), [
                'title' => 'bail|required',
                'price' => ($request->price ? 'bail|numeric' : ''),
                'instructor_ids' => ($request->instructor_ids ? 'bail' : ''),
                'icon' => 'bail|required',
            ], [], $attributes);

            if ($validator->passes()) {

				$display_order = DB::table('course')->max('display_order');
				
                $record = new CourseModel();
                $record->title = $request->title;
                $record->day = $request->day;
                $record->price = $request->price;
                $record->instructor_ids = ($request->instructor_ids ? implode(',', $request->instructor_ids) : '');
                $record->description = $request->description;
                $record->outline = $request->outline;
                $record->image = $request->image;
                $record->icon = $request->icon;
                $record->short_info = $request->short_info;
                $record->location = $request->location;
				$record->display_order = ($display_order ? $display_order + 1 : 1);
                $record->save();

                $this->response['Result'] = "OK";
                $this->response['Record'] = $record;
                return json_encode($this->response);
            }
        } else if ($request->isMethod('post') && $request->type == "date_create") {
            $attributes = array(
                'start_date' => 'Start Date',
                'end_date' => 'End Date'
            );
            $validator = Validator::make($request->all(), [
                'start_date' => 'bail|required|date',
                'end_date' => 'bail|required|date|after:start_date'
            ], [], $attributes);

            if ($validator->passes()) {

                $record = new CourseDate();
                $record->start_date = $request->start_date;
                $record->end_date = $request->end_date;
                $record->course_id = $request->course_id;
                $record->save();

                $this->response['Result'] = "OK";
                $this->response['Record'] = $record;
                return json_encode($this->response);
            }
        } else if ($request->isMethod('post') && $request->type == "video_create") {
            $attributes = array(
                'embed_url' => 'Youtube Embed Code',
            );
            $validator = Validator::make($request->all(), [
                'embed_url' => 'bail|required',
            ], [], $attributes);

            if ($validator->passes()) {

                $record = new CourseVideo();
                $record->embed_url = $request->embed_url;
                $record->course_id = $request->course_id;
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
        if ($request->isMethod('post') && $request->type == "course_delete") {
            $record = CourseModel::where('id', $request->id)
                ->first();
            if ($record->delete()) {

                if (File::isFile('public/assets/admin/images/course/' . $record->image)) {
                    \File::delete('public/assets/admin/images/course/' . $record->image);
                }

                $this->response['Result'] = "OK";
                return json_encode($this->response);
            }
        } else if ($request->isMethod('post') && $request->type == "date_delete") {
            $record = CourseDate::where('id', $request->id)
                ->first();
            if ($record->delete()) {

                $this->response['Result'] = "OK";
                return json_encode($this->response);
            }
        } else if ($request->isMethod('post') && $request->type == "video_delete") {
            $record = CourseVideo::where('id', $request->id)
                ->first();
            if ($record->delete()) {

                $this->response['Result'] = "OK";
                return json_encode($this->response);
            }
        }
    }
    public function courses(Request $request)
    {
        $title = $request->title;
        $query = CourseModel::query();
        if (!empty($title)) {
            $query = $query->where(function($query) use ($title){
                $query->where('title', 'like', '%' . $title . '%');
            });
        }
        $data =	$query->get();
        return json_encode($data);
    }
    public function sorting(Request $request) {
		if ($request->isMethod('post')) {
			$array = $request->arrayorder;
			$count = 1;
			foreach ($array as $idval)
			{	
				CourseModel::where('id', $idval)
				->update([
					'display_order' => $count
				]);			
				$count++;
			}
		} else {
			$this->data['courses'] = CourseModel::orderBy('display_order', 'asc')->get();
			return View::make('admin.course.sorting')->with('data', $this->data);
		}
    }
}
