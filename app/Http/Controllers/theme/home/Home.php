<?php
namespace App\Http\Controllers\theme\home;
use Illuminate\Http\Request;
use App\Http\Controllers\theme\Controller;
use DB, View, Validator, Route, Auth, File, Carbon\Carbon, Mail, URL, Excel, Session, PDF, Storage;
class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(Request $request)
    {
		try {
			$this->data["blogs"] = DB::select("SELECT b.*, (SELECT COUNT(*)  FROM review v WHERE b.id = v.blog_id AND v.status = 1) AS comments_count FROM blog b ORDER BY b.created_at DESC LIMIT 0,3");
			return View::make('theme.home.index')->with('data', $this->data);
		} catch(\Exception $e) {
			return abort(404);
		}  
    }
}
?>
