<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\LanguageSettings;
use DB, View;
class Privacy extends Controller
{
	public function index(Request $request)
	{
		return View::make('customer.privacy')->with('data', $this->data);
	}
}
?>
