<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB,Artisan;
class Command extends Controller
{
	public function index(Request $request)
	{
		echo '<br>init migrate:install...';
     /*  Artisan::call('cache:clear');
      Artisan::call('config:cache');
      Artisan::call('migrate'); */
      Artisan::call('passport:install');
      echo 'done migrate:install';
	}
}
?>
