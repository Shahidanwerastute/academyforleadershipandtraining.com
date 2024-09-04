<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\LanguageSettings;
use DB;
class Language extends Controller
{
	public function language(Request $request)
	{
		session()->put('language', $request->code);
		return response()->json([
			'language' => session()->get('language')
		]);
	}
}
?>
