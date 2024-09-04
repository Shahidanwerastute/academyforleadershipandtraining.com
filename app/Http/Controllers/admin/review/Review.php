<?php
namespace App\Http\Controllers\admin\review;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\Controller;
use App\Review as ReviewModel;
use DB, View, Validator, Route, Auth, File, Carbon\Carbon, Str, App;
class Review extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index(Request $request)
	{
		return View::make('admin.review.index')->with('data', $this->data);
	}
	public function listing(Request $request)
	{
		if ($request->isMethod('post')) 
		{  
			$jtStartIndex  = $_REQUEST['jtStartIndex'];
			$jtPageSize    = $_REQUEST['jtPageSize'];
			$name = $request->name;
			$query = ReviewModel::leftJoin('blog', function ($join)  {
				$join->on('review.blog_id', '=', 'blog.id');
			});
			if (!empty($name)) {
				$query->where(function($query) use($name){
					$query->where('review.name', 'like', '%' . $name . '%');
					$query->orWhere('review.email', 'like', '%' . $name . '%');
				});
			}
			if(!empty($_REQUEST['jtSorting']) && $_REQUEST['jtSorting'] != "undefined") {
				$jtSorting   = explode(' ', $_REQUEST['jtSorting']);
				$query = $query->orderBy($jtSorting[0], $jtSorting[1]);
			} 
			$query->select('blog.title as blog_title', 'review.*');
			$dataCount = $query->count();
			$query->limit($jtPageSize)->offset($jtStartIndex);
			$data =	$query->get();
			$this->response['Result']           = "OK";
			$this->response['TotalRecordCount'] = $dataCount;
			$this->response['Records']          = $data;
			return json_encode($this->response);
		} 
	}
	
	public function delete(Request $request)
	{
		$record = ReviewModel::where('id', $request->id)->first();
		if($record->delete())
		{	
			$this->response['Result'] = "OK";
			return json_encode($this->response);
		}
	}
}