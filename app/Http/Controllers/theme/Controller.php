<?php
namespace App\Http\Controllers\theme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
use App\GeneralSetting;
use DB;
class Controller extends BaseController
{
    public $response = array();
    public $data = array();
    public $rtl;
    public function __construct()
    {
        parent::__construct();
        app()->setLocale(session()->get('language') ? session()->get('language') : 'en');
		$this->data['general_setting'] = GeneralSetting::first();

		//recent 2 blogs
		$this->data["recent_blogs"] = DB::select("SELECT b.*, (SELECT COUNT(*)  FROM review v WHERE b.id = v.blog_id AND v.status = 1) AS comments_count FROM blog b ORDER BY b.created_at DESC LIMIT 0,2");
    }
}

