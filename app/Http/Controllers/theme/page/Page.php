<?php
namespace App\Http\Controllers\theme\page;

use Illuminate\Http\Request;
use App\Http\Controllers\theme\Controller;
use DB, View, Validator, Route, Auth, File, Carbon\Carbon, Mail, URL, Excel, Session, PDF, Storage;
use App\Mail\Email;

class Page extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function leadership_training(Request $request)
	{
		try {
			return View::make('theme.page.leadership-training')->with('data', $this->data);
		} catch (\Exception $e) {
			return abort(404);
		}
	}

	public function executive_coaching(Request $request)
	{
		try {
			return View::make('theme.page.executive-coaching')->with('data', $this->data);
		} catch (\Exception $e) {
			return abort(404);
		}
	}

	public function consulting(Request $request)
	{
		try {
			return View::make('theme.page.consulting')->with('data', $this->data);
		} catch (\Exception $e) {
			return abort(404);
		}
	}

	public function communications_assessment(Request $request)
	{
		try {
			return View::make('theme.page.communications-assessment')->with('data', $this->data);
		} catch (\Exception $e) {
			return abort(404);
		}
	}

	public function about(Request $request)
	{
		try {
			return View::make('theme.page.about')->with('data', $this->data);
		} catch (\Exception $e) {
			return abort(404);
		}
	}

	public function resources(Request $request)
	{
		try {
			return View::make('theme.page.resources')->with('data', $this->data);
		} catch (\Exception $e) {
			return abort(404);
		}
	}

	public function contact(Request $request)
	{
		try {
			if ($request->isMethod('post')) {
				$attributes = array(
					'first_name' => "First Name",
					'last_name' => "Last Name",
					'email' => "Email"
				);
				$messages = [
					'g-recaptcha-response.required' => 'Captcha is required!',
				];
				$validator = Validator::make($request->all(), [
					'first_name' => 'bail|required',
					'last_name' => 'bail|required',
					'email' => 'bail|required|email',
					'g-recaptcha-response' => 'required',
				], $messages, $attributes);
				if (!is_null($request['g-recaptcha-response'])) {
					$captcha = $request['g-recaptcha-response'];
					$secretKey = '6LfccMMUAAAAAGCNuw6JSNbZuzvybPOCU6Cq20qp';
					$ip = $_SERVER['REMOTE_ADDR'];
					$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
					$responseKeys = json_decode($response,true);
					
					if (!$responseKeys["success"]) {
						$validator->errors()->add('g-recaptcha-response', 'Captcha is required!');
					}
				}
				if ($validator->fails()) {
					return response()->json([
						'success' => false,
						'error' => $validator->errors()
					]);
				} else {
					/*Email*/

					$this->data['subject'] = "A contact us form is received from your website | " . config('app.name');
					$this->data['view'] = 'emails.contact';
					Mail::to("admin@taflat.com")->send(new Email($this->data));
					return response()->json([
						'success' => true,
						'reset' => 1,
						'message' => 'Thank you for your inquiry. We will respond as soon as possible.'
					]);
				}
			}

			return View::make('theme.page.contact')->with('data', $this->data);
		} catch (\Exception $e) {
			return abort(404);
		}
	}

	public function blog(Request $request, $type = "")
	{
		try {
			if ($type == "all") {
				$this->data["blogs"] = DB::select("SELECT b.*, (SELECT COUNT(*)  FROM review v WHERE b.id = v.blog_id AND v.status = 1) AS comments_count FROM blog b ORDER BY b.created_at DESC");
			} else {
				$this->data["blogs"] = DB::select("SELECT b.*, (SELECT COUNT(*)  FROM review v WHERE b.id = v.blog_id AND v.status = 1) AS comments_count FROM blog b ORDER BY b.created_at DESC LIMIT 0,20");
			}
			return View::make('theme.page.blog')->with('data', $this->data);
		} catch (\Exception $e) {
			return abort(404);
		}
	}

	public function blog_detail(Request $request, $id, $title)
	{
		try {
			$this->data["blog"] = DB::table("blog")->where("id", $id)->select("*",  DB::raw("(SELECT COUNT(*) FROM review v WHERE blog.id = v.blog_id AND v.status = 1) AS comments_count"))->first();
			$this->data["comments"] = DB::select("SELECT * FROM review where status = 1 AND blog_id = " . $id);
			return View::make('theme.page.blog-detail')->with('data', $this->data);
		} catch (\Exception $e) {
			return abort(404);
		}
	}

	public function worst_practices_in_corporate_training(Request $request)
	{
		try {
			return View::make('theme.page.worst_practices_in_corporate_training')->with('data', $this->data);
		} catch (\Exception $e) {
			return abort(404);
		}
	}

	public function clients(Request $request)
	{
		try {
			return View::make('theme.page.clients')->with('data', $this->data);
		} catch (\Exception $e) {
			return abort(404);
		}
	}

	public function training(Request $request)
	{
		try {
			return View::make('theme.page.training')->with('data', $this->data);
		} catch (\Exception $e) {
			return abort(404);
		}
	}

	public function tos(Request $request)
	{
		try {
			return View::make('theme.page.tos')->with('data', $this->data);
		} catch (\Exception $e) {
			return abort(404);
		}
	}

	public function privacy_policy(Request $request)
	{
		try {
			return View::make('theme.page.privacy_policy')->with('data', $this->data);
		} catch (\Exception $e) {
			return abort(404);
		}
	}

	public function video_gallery(Request $request)
	{
		try {
			return View::make('theme.page.video_gallery')->with('data', $this->data);
		} catch (\Exception $e) {
			return abort(404);
		}
	}
}
