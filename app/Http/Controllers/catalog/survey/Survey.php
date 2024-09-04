<?php
namespace App\Http\Controllers\catalog\survey;
use Illuminate\Http\Request;
use App\Http\Controllers\catalog\Controller;
use App\Survey as SurveyModel;
use App\SurveySubmission;
use App\SurveyAnswer;
use App\Employee;
use App\Mail\Email;
use App\Coupon;
use App\Group;
use App\FriendAssessment;
use DB, View, Validator, Route, Auth, File, Carbon\Carbon, Mail, URL, Excel, Session, PDF, Storage;

class Survey extends Controller
{
	private $count = 0;
	private $filename;
	public function __construct()
	{
		parent::__construct();
	}
	public function index(Request $request)
	{

		try {

			$data = $request->all();


			//dd($this->data['route-paramters'],$_GET);die;
			//forget session for friend assessment
			session()->forget('friend_assessment_id');
			session()->forget('employee_assessment_id');
			//var_dump($this->data['route-paramters']['session_id'],$_GET);die;

			if(Route::is('catalog-survey-form')) {
				$this->data['employee'] = Employee::where('code', $this->data['route-paramters']['code'])->first();
				$this->data['survey'] = SurveyModel::where('group_id', $this->data['employee']->group_id)->first();
				$this->count = SurveySubmission::where('employee_code', $this->data['employee']->code)->count();
			} else if(Route::is('catalog-rootpath')) {
				$this->data['survey'] = SurveyModel::where('group_id', 1)->first();
			} else if(Route::is('catalog-survey-friend-assessment-form')) {


				$this->data['friend_info'] = FriendAssessment::join('survey_submission', function ($join) {
					$join->on('survey_submission.id', '=', 'friend_assessment.survey_submission_id');
				})
					->where('friend_assessment.id', $this->data['route-paramters']['id'])
					->select('survey_submission.*', 'friend_assessment.*')
					->first();

				if ($this->data['friend_info']) {
					$this->data['employee'] = Employee::where('id', $this->data['friend_info']->employee_id)->first();
					$this->data['survey'] = SurveyModel::where('id', $this->data['friend_info']->survey_id)->first();
					$this->count = ($this->data['friend_info']->is_submit == 1 ? 1 : 0);




					//set session for friend assessment
					session()->put('friend_assessment_id', $this->data['friend_info']->id);
				} else {
					echo 'error here';die;
				}


			}
			else if(Route::is('catalog-survey-employee-friend-assessment-form')) {

				$this->data['friend_info'] = FriendAssessment::leftJoin('survey_submission', function ($join) {
					$join->on('survey_submission.id', '=', 'friend_assessment.survey_submission_id');
				})
					->where('friend_assessment.id', $this->data['route-paramters']['id'])
					->select('survey_submission.*', 'friend_assessment.*')
					->first();
				if ($this->data['friend_info']) {
					$this->data['employee'] = Employee::where('id', $this->data['friend_info']->employee_id)->first();
					$this->data['survey'] = SurveyModel::where('group_id', 1)->first();

					$record = SurveySubmission::where('employee_friend_id', $this->data['route-paramters']['id'])->where('session_id', $this->data['route-paramters']['session_id'])->first();
					$this->count = ($record ? 1 : 0);

					//set session for friend assessment
					session()->put('friend_assessment_id', $this->data['friend_info']->id);
				} else {
					echo 'error here';die;
				}
			} else if(Route::is('catalog-survey-employee-assessment-form')) {
				// var_dump($this->data['route-paramters']['id']);die;

				$this->data['employee_info'] = Employee::leftjoin('survey_submission', function ($join) {
					$join->on('survey_submission.employee_id', '=', 'employee.id');
				})
					->where('employee.id', $this->data['route-paramters']['id'])
					->select('survey_submission.*', 'employee.*')
					->first();

				if ($this->data['employee_info']) {
					$this->data['employee'] = Employee::where('id', $this->data['route-paramters']['id'])->first();
					$this->data['survey'] = SurveyModel::where('group_id', 1)->first();

					$record = SurveySubmission::where('employee_id', $this->data['route-paramters']['id'])->where('session_id', $this->data['route-paramters']['session_id'])->whereNull('employee_friend_id')->first();
					$this->count = ($record ? 1 : 0);

					// $this->count = ($this->data['employee_info']->is_submit == 1 ? 1 : 0);
					// $this->count = 1; // Bilal changed this and above line, to mark survey already filled

					//set session for friend assessment
					session()->put('employee_assessment_id', $this->data['employee_info']->id);
				} else {
					echo 'error here';die;
				}
			}

			if ($this->data['survey']) {
				$this->data['company'] = $this->data['survey']->company;
				$validation = $this->rules($this->data['survey']);
			} else {
				$this->data['company'] = '';
			}

			$this->data['survey_already_submitted'] = ($this->count > 0 ? true : false);


			if ($request->isMethod('post'))
			{

				//var_dump($this->data['route-paramters']['session_id'],$request->all());die;
				//var_dump($_GET['session_id']);die;
				$b = $a = $l = $r = 0;
				$validator = Validator::make($request->all() , $validation['rules'], $validation['messages'], $validation['attributes']);
				if ($validator->passes() && $this->count == 0 && ($this->data['company']->limit == Null || $this->data['survey']->count < $this->data['company']->limit))
				{
					//dd($this->data['route-paramters']);die;
					/*Register Employee*/
					if(Route::is('catalog-rootpath'))
					{
						$this->data['employee'] = new Employee();
						$this->data['employee']->first_name = $request->first_name;
						$this->data['employee']->last_name = $request->last_name;
						$this->data['employee']->email = $request->email;
						$this->data['employee']->mobile = $request->mobile;
						$this->data['employee']->code = time() . str_random(5);
						$this->data['employee']->p_status = 0;
						if($request->coupon_status == 1 && session()->get('coupon')['type'] == 0) {

							
							$this->data['employee']->group_id = session()->get('coupon')['result']->id;
						}
						else{
							$this->data['employee']->group_id = $this->data['survey']->group_id;
						}
						$this->data['employee']->save();
					}

					$submission = new SurveySubmission();
					$submission->survey_id = $this->data['survey']->id;

					if(Route::is('catalog-rootpath') && $request->coupon_status == 1 && session()->get('coupon')['type'] == 0) {
						$submission->group_id = session()->get('coupon')['result']->id;
						$submission->p_status = 1;
					} else if(!Route::is('catalog-survey-friend-assessment-form'))
						$submission->group_id = $this->data['survey']->group_id;
					else if(!Route::is('catalog-survey-employee-assessment-form'))
						$submission->group_id = $this->data['survey']->group_id;

					if(Route::is('catalog-survey-form'))
						$submission->p_status = 1;
					else if(Route::is('catalog-rootpath') && $request->coupon_status == 2 && session()->get('coupon')['type'] == 1 && session()->get('coupon')['result']->percentage == "100")
						$submission->p_status = 1;

					if(Route::is('catalog-survey-friend-assessment-form')) {

						$submission->group_id = $this->data['friend_info']->group_id;
						$submission->parent_assessment_id = $this->data['friend_info']->survey_submission_id;
						$submission->p_status = 1;
					}
					if(Route::is('catalog-survey-employee-friend-assessment-form')) {
						$submission->group_id = 1;
						$submission->employee_id = $this->data['friend_info']->employee_id;
						$submission->employee_friend_id = $this->data['friend_info']->id;
						$submission->p_status = 1;

					}
					if(Route::is('catalog-survey-employee-assessment-form')) {
						$submission->group_id = 1;
						$submission->p_status = 1;
					}

					$submission->employee_id = $this->data['employee']->id;
					$submission->employee_code = $this->data['employee']->code;
					if(isset($this->data['route-paramters']['session_id']) && (Route::is('catalog-survey-employee-friend-assessment-form') || Route::is('catalog-survey-employee-assessment-form'))) {
						$submission->session_id =  $this->data['route-paramters']['session_id'] ;
					}

					$submission->save();

					// add data in the new table for logs

					DB::table('servey_submission_form_data')->insert(
						['survey_submission_id' => $submission->id, 'form_data' => json_encode($request->all())]
					);

					//insert submission_id in friends survey_submissions for regular things work
					if(Route::is('catalog-survey-employee-assessment-form')) {
						$submission_update_data_for_friends = SurveySubmission::where('employee_id',$this->data['employee']->id)->get();
						foreach ($submission_update_data_for_friends as $submission_update) {
							$submission_update = SurveySubmission::where([
								"id" => $submission_update->id,
							])->first();
							$submission_update->employee_submited = 1;
							$submission_update->save();
						}
					}


					foreach ($this->data['survey']->questions() as $row)
					{
						if ($request->input('field' . $row->id))
						{
							$record = new SurveyAnswer();
							$record->survey_field_id = $row->id;
							$record->answer = $request->input('field' . $row->id);
							$record->survey_submission_id = $submission->id;
							$record->save();

							/*Calculate Quardinates*/
							if(strtolower($request->input('field' . $row->id)) == "a") $a++;
							else if(strtolower($request->input('field' . $row->id)) == "b") $b++;
							else if(strtolower($request->input('field' . $row->id)) == "l") $l++;
							else if(strtolower($request->input('field' . $row->id)) == "r") $r++;
						}
					}

					$this->data['survey']->count = ($this->data['survey']->count + 1);
					$this->data['survey']->save();

					/*Fetch Quardinates*/
					$h_value = $r-$l;
					$v_value = $a-$b;
					$h_value = ($h_value < 0 ? $h_value: '+'.$h_value);
					$v_value = ($v_value < 0 ? $v_value: '+'.$v_value);
					$h_sign = (str_contains($h_value, '-') ? '-' : '+');
					$v_sign = (str_contains($v_value, '-') ? '-' : '+');
					$this->data['record'] = DB::table('score')->where('h', $h_sign)->where('v', $v_sign)->first();
					if (Route::is('catalog-survey-employee-friend-assessment-form')) {
						$this->data['sub_quadrant'] = DB::table('friend_sub_quadrant')
							->where('h', 'like', '%' . $h_value . '%')
							->where('v', 'like', '%' . $v_value . '%')
							->first();
					} else {
						$this->data['sub_quadrant'] = DB::table('sub_quadrant')
							->where('h', 'like', '%' . $h_value . '%')
							->where('v', 'like', '%' . $v_value . '%')
							->first();
					}


					/*Save Quardinates*/
					$submission->a = $a;
					$submission->b = $b;
					$submission->l = $l;
					$submission->r = $r;
					$submission->image = strtolower($this->data['record']->behavior).'.png';
					$submission->behavior = strtolower($this->data['record']->behavior);
					$submission->sub_behavior = strtolower($this->data['sub_quadrant']->behavior);
					$submission->save();

					/*Save submission_id in session*/
					session()->put('submission_id', $submission->id);

					/*Save Quardinates in session*/
					session()->put('vertical', $v_value);
					session()->put('horizontal', $h_value);

					if(!Route::is('catalog-survey-employee-assessment-form')) {
						/*Invite friends for assessments*/
						if(count($request->invite['name']) > 0 && !Route::is('catalog-survey-friend-assessment-form')) {
							for($i = 0; $i < count($request->invite['name']); $i++) {
								if($request->invite['name'][$i] && $request->invite['email'][$i]) {
									$this->data['friend'] = FriendAssessment::create([
										"name" => $request->invite['name'][$i],
										"email" => $request->invite['email'][$i],
										"survey_submission_id" => $submission->id,
										"employee_id" => $this->data['employee']->id,
									]);
								}
							}
						}
					}
						
					/*Friend Assessment Complete*/
					if(Route::is('catalog-survey-friend-assessment-form') || Route::is('catalog-survey-employee-friend-assessment-form')) {
						$this->data['friend_info']->is_submit = 1;
						$this->data['friend_info']->save();
					}

					$this->data['count-friends'] = FriendAssessment::where('survey_submission_id', $submission->id)->count();

					if(Route::is('catalog-survey-form') || (Route::is('catalog-rootpath') && $request->coupon_status == 1 && session()->get('coupon')['type'] == 0) || (Route::is('catalog-rootpath') && $request->coupon_status == 2 && session()->get('coupon')['type'] == 1 && session()->get('coupon')['result']->percentage == "100") || Route::is('catalog-survey-friend-assessment-form') || Route::is('catalog-survey-employee-assessment-form') || Route::is('catalog-survey-employee-friend-assessment-form'))
					{
						/*Email*/
						$this->file_name = str_slug($this->data['employee']->first_name, '-').'-'.str_slug($this->data['employee']->last_name, '-');
						$this->data['submission'] = SurveySubmission::join('employee', function ($join) {
							$join->on('employee.id', '=', 'survey_submission.employee_id');
						})
							->where('survey_submission.id', $submission->id)
							->select('employee.*', 'survey_submission.*')->first();
						$this->data['view'] = 'emails.survey';

						if(Route::is('catalog-survey-employee-friend-assessment-form')) {
							$this->data['subject'] = "Thanks for taking the assessment on ".$this->data['employee']->first_name.' '.$this->data['employee']->last_name;
							$content = "<p>".$this->data['employee']->first_name.' '.$this->data['employee']->last_name."' complete report will be emailed directly.</p>";
							$content .= "<p>Please contact ".$this->data['employee']->first_name.' '.$this->data['employee']->last_name." to find out the final results of the survey.</p>";
							$content .= "<p>Please contact us with any questions.</p>";
							$this->data['content'] = $content;
							//Mail::to([$this->data['friend_info']->email])->send(new Email($this->data));

							/*Aggregate Results Email */
							$query = SurveySubmission::where('survey_submission.group_id', $this->data['friend_info']->group_id);
							$query->where('p_status', 1);
							$query->where('id', $this->data['friend_info']->survey_submission_id);
							$query->orWhere('parent_assessment_id', $this->data['friend_info']->survey_submission_id);
							$result = $query->select(DB::raw("ROUND(AVG(b)) as b"), DB::raw("ROUND(AVG(a)) as a"), DB::raw("ROUND(AVG(l)) as l"), DB::raw("ROUND(AVG(r)) as r"))->first();

							/*Fetch Quardinates*/
							$h_value = $result['r']-$result['l'];
							$v_value = $result['a']-$result['b'];
							if($h_value == 5 || $h_value == 0) $h_value = $h_value - 1; else if($h_value == -5) $h_value = $h_value + 1;
							if($v_value == 5 || $v_value == 0) $v_value = $v_value - 1; else if($v_value == -5) $v_value = $v_value + 1;
							$h_value = ($h_value < 0 ? $h_value: '+'.$h_value);
							$v_value = ($v_value < 0 ? $v_value: '+'.$v_value);
							$h_sign = (str_contains($h_value, '-') ? '-' : '+');
							$v_sign = (str_contains($v_value, '-') ? '-' : '+');
							$this->data['record'] = DB::table('score')->where('h', $h_sign)->where('v', $v_sign)->first();
							$this->data['sub_quadrant'] = DB::table('sub_quadrant')
								->where('h', 'like', '%' . $h_value . '%')
								->where('v', 'like', '%' . $v_value . '%')
								->first();

							PDF::loadView('catalog.survey.pdf', ['data' => $this->data])->save('public/assets/admin/file/Aggregate-Assessment-Result-('.$this->file_name.').pdf', 'overwrite');
							$this->data['subject'] = "Assessment Result | " . config('app.name');
							$content = "<p>".$this->data['friend_info']->name." has completed your Communication Styles assessment. This email contains two files for you: </p>";
							$content .= "<p>1) your original self-assessment and 2) the aggregate of peer-assessments completed to date. </p>";
							$content .= "<p>You will receive this email each time a peer completes your assessment.</p>";
							$content .= "<p>If you have any questions, please contact us at jim@taflat.com. Thank you.</p>";
							$this->data['content'] = $content;
							$this->data['attachment'] = ['public/assets/admin/file/Aggregate-Assessment-Result-('.$this->file_name.').pdf', 'public/assets/admin/file/Assessment-Result-('.$this->file_name.').pdf'];
							//Mail::to([$this->data['employee']->email])->cc([config("setting.cc_email")])->send(new Email($this->data));
							//Mail::to([$this->data['employee']->email])->send(new Email($this->data));
							/*Aggregate Email End */

							
						}
						else {
							
							//dd('else condition');
							$this->data['subject'] = "Assessment Result | " . config('app.name');
							PDF::loadView('catalog.survey.pdf', ['data' => $this->data])->save('public/assets/admin/file/Assessment-Result-('.$this->file_name.').pdf', 'overwrite');
							$this->data['attachment'] = ['public/assets/admin/file/Assessment-Result-('.$this->file_name.').pdf'];
							$content = "<p>Thank you for completing your Communication Style Assessment.</p>";
							$content .= "<p>The attached report includes customized insight into your specific style.</p>";
							$content .= "<p>Please contact us with any questions.</p>";
							$this->data['content'] = $content;
							//Mail::to([$this->data['employee']->email])->cc([config("setting.cc_email")])->send(new Email($this->data));

							if(Route::is('catalog-rootpath') || Route::is('catalog-survey-form') ){ // only send email when not taking self-assessment using 360
								Mail::to([$this->data['employee']->email])->send(new Email($this->data));
							}
						}

						/*Delete Pdf file*/
						$success = Storage::deleteDirectory('public/assets/admin/file');
					}

					
					if (Route::is('catalog-survey-employee-assessment-form')) { 
						
						return response()
							->json([
								'success' => 1,
								'reload' => 1,
								'url' => route('catalog-thank-you', [$submission->id]),
							]);
					}
					if (Route::is('catalog-survey-employee-friend-assessment-form')) {
						return response()
							->json([
								'success' => 1,
								'reload' => 1,
								'url' => route('catalog-friend-thank-you', [$submission->id]),
							]);
					}

					if(isset($this->data['count-friends']) && Route::is('catalog-rootpath')){

						if($this->data['count-friends'] > 0 && $request->coupon_status == 2){


							$submission2 = SurveySubmission::where('id', $submission->id)->first();
							$submission2->p_status = 1;
			                $submission2->amount = 0;
			                $submission2->save();
			
			/*Send Email To Friends*/
			$this->data['friends'] = FriendAssessment::where('survey_submission_id', $submission->id)->get();
			foreach($this->data['friends'] as $friend) {
				$this->data['view'] = 'emails.friend_assesment';
				$this->data['subject'] = "Peer Assessment Request | " . config('app.name');	
				$this->data['friend'] = $friend;
				Mail::to($friend->email)->send(new Email($this->data)); 
			} 


			return response()
							->json([
								'success' => 1,
								'reload' => 1,
								'url' => route('catalog-thank-you', [$submission->id]),
							]);

						}
					} 

					return response()
						->json([
							'success' => 1,
							'reload' => 1,
							'url' => ((
								(Route::is('catalog-survey-form') && $this->data['count-friends'] == 0) || 
								Route::is('catalog-survey-friend-assessment-form') || 
								Route::is('catalog-survey-employee-assessment-form') || 
								(Route::is('catalog-rootpath') && $request->coupon_status == 1 && 
								session()->get('coupon')['type'] == 0 && $this->data['count-friends'] == 0) || 
								(Route::is('catalog-rootpath') && $request->coupon_status == 2 && 
								session()->get('coupon')['type'] == 1 && session()->get('coupon')['result']->percentage == "100"  && $this->data['count-friends'] == 0) || 
								Route::is('catalog-survey-friend-assessment-form') || 
								Route::is('catalog-survey-employee-assessment-form')) || 
							    Route::is('catalog-survey-employee-friend-assessment-form') || 
							    Route::is('catalog-survey-employee-assessment-form') ? route('catalog-thank-you', [$submission->id]) : route('catalog-paypal-payment', [$request->coupon_status])),
						]);
				}
				return response()
					->json([
						'success' => false,
						'error' => $validator->errors(),
						'message'=>($this->count > 0 ? 'We are unable to save the survey, as this survey has already been submitted.' : ($this->data['company']->limit != Null && $this->data['survey']->count >= $this->data['company']->limit ? "You can't submit this survey. Maximum limit of submissions of this survey exceeded." : false)),
					]);
			}


			if(Route::is('catalog-survey-employee-assessment-form')){
				return View::make('catalog.survey.employee_survey')->with('data', $this->data);
			}

			if(Route::is('catalog-survey-employee-friend-assessment-form')){
				return View::make('catalog.survey.employee_friend_survey')->with('data', $this->data);
			}
			//dd($this->data);
			return View::make('catalog.survey.index')->with('data', $this->data);
		} catch(\Exception $e) {
			return abort(404);
		}
	}
	public function rules($form)
	{
		$array = [];
		if(Route::is('catalog-rootpath'))
		{
			$array['rules']['first_name'] = 'required';
			$array['rules']['last_name'] = 'required';
			$array['rules']['email'] = 'required|email';
		}
		foreach ($form->questions() as $row)
		{
			if ($row->require == 1 && $row->is_extra == 0)
			{
				$array['rules']['field' . $row->id] = 'required';
				$array['attributes']['field' . $row
					->id] = $row->label;
				$array['messages']['field' . $row->id . ".required"] = "Answer of this question is compulsory!";
			}
		}
		return $array;
	}
	public function thanku(Request $request, $id)
	{
		try {
			$h_sign = (str_contains(session()->get('horizontal'), '-') ? '-' : '+');
			$v_sign = (str_contains(session()->get('vertical'), '-') ? '-' : '+');
			$this->data['record'] = DB::table('score')
				->where('h', $h_sign)
				->where('v', $v_sign)
				->first();
			$this->data['submission'] = SurveySubmission::join('employee', function ($join) {
				$join->on('employee.id', '=', 'survey_submission.employee_id');
			})
				->where('survey_submission.id', $id)
				->select('employee.*', 'survey_submission.*')->first();
			$this->data['sub_quadrant'] = DB::table('sub_quadrant')
				->where('h', 'like', '%' . session()->get('horizontal') . '%')
				->where('v', 'like', '%' . session()->get('vertical') . '%')
				->first();

			if(session()->has('friend_assessment_id')) {
				$this->data['friend_info'] = FriendAssessment::join('survey_submission', function ($join) {
					$join->on('survey_submission.id', '=', 'friend_assessment.survey_submission_id');
				})
					->where('friend_assessment.id', session()->get('friend_assessment_id'))
					->select('survey_submission.*', 'friend_assessment.*')
					->first();
			}

			return View::make('catalog.survey.thank-you')
				->with('data', $this->data);
		} catch(\Exception $e) {
			return abort(404);
		}
	}
	public function friend_thanku(Request $request, $id)
	{
		try {
			$h_sign = (str_contains(session()->get('horizontal'), '-') ? '-' : '+');
			$v_sign = (str_contains(session()->get('vertical'), '-') ? '-' : '+');
			$this->data['record'] = DB::table('score')
				->where('h', $h_sign)
				->where('v', $v_sign)
				->first();
			$this->data['submission'] = SurveySubmission::join('employee', function ($join) {
				$join->on('employee.id', '=', 'survey_submission.employee_id');
			})
				->where('survey_submission.id', $id)
				->select('employee.*', 'survey_submission.*')->first();
			$this->data['sub_quadrant'] = DB::table('sub_quadrant')
				->where('h', 'like', '%' . session()->get('horizontal') . '%')
				->where('v', 'like', '%' . session()->get('vertical') . '%')
				->first();

			if(session()->has('friend_assessment_id')) {
				$this->data['friend_info'] = FriendAssessment::join('survey_submission', function ($join) {
					$join->on('survey_submission.id', '=', 'friend_assessment.survey_submission_id');
				})
					->where('friend_assessment.id', session()->get('friend_assessment_id'))
					->select('survey_submission.*', 'friend_assessment.*')
					->first();
			}

			return View::make('catalog.survey.friend-thank-you')
				->with('data', $this->data);
		} catch(\Exception $e) {
			return abort(404);
		}
	}
	public function code(Request $request)
	{
		$result = Group::where('coupon', $request->code)->whereNotNull('coupon')->first();
		$this->response['payment_info'] = '<span>Self Assessment Price: $'.$this->data['general_setting']->survey_price.'</span>';
		if($result) {
			$this->response['type'] = 0;
			$this->response['result'] = $result;
		} else {
			$result = Coupon::where('code', $request->code)
				->where('start_date', '<=', Carbon::now()->toDateString())
				->where('end_date', '>=', Carbon::now()->toDateString())
				->where('type', 0)
				->orderBy('created_at', 'DESC')
				->first();
			if($result) {
				$discount_price = $this->data['general_setting']->survey_price - ($this->data['general_setting']->survey_price * ($result->percentage / 100));
				$this->response['type'] = 1;
				$this->response['payment_info'] = ($result->percentage > 0 ? '<span>Self Assessment Price: $'.$discount_price.'</span>' : '<span>Self Assessment Price: $'.$this->data['general_setting']->survey_price.'</span>');
				$this->response['result'] = $result;
			}
		}
		/*push in session*/
		if($result) {
			session()->put('coupon.type', (isset($this->response['type']) ? $this->response['type'] : Null));
			session()->put('coupon.result', $result);
		} else {
			session()->forget('coupon');
		}
		return json_encode($this->response);
	}
	public function survey_file_upload(Request $request)
	{
		$insert = array();
		$html ='';
		if($request->hasFile('invite_file')){

			$path = $request->file('invite_file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();

			if(!empty($data) && $data->count()){

				foreach ($data->toArray() as $key => $value) {
					$insert[] = ['name' => $value['name'], 'email' => $value['email']];
					$name = $value['name'];
					$email = $value['email'];
					$html.= '<div class="recordset">';
					$html.= '<div data-id="'.$key.'" id="btnMinus2" style="float: right; border: 0px; background-image: url(&quot;https://localhost/academy-for-leadership-and-training/public/assets/plugins/cz-more/img/remove.png&quot;); background-position: center center; background-repeat: no-repeat; height: 25px; width: 25px;" e=""></div>';
					$html.= '<div class="fieldRow clearfix">';
					$html.= '<div class="col-md-6">';
					$html.= '<div class="form-group">';
					$html.= '<div class="controls ">';
					$html.= '<input placeholder="Name*" class="form-control require" name="invite[name][]" value="'.$name.'">';
					$html.= '</div>';
					$html.= '</div>';
					$html.= '</div>';
					$html.= '<div class="col-md-5">';
					$html.= '<div class="form-group">';
					$html.= '<div class="controls ">';
					$html.= '<input placeholder="Email*" class="form-control require" name="invite[email][]" value="'.$email.'">';
					$html.= '</div>';
					$html.= '</div>';
					$html.= '</div>';
					$html.= '</div>';
					$html.= '</div>';

				}
				$this->response['data_count'] = $data->count();
				$this->response['data_import'] = $insert;
				$this->response['html'] = $html;

				return json_encode($this->response);
			}
		}else {
			$this->response['data_import'] = [];
			$this->response['data_count'] = 0;
			$this->response['html'] = $html;
		}
		//var_dump($this->response['data_import']);
		return json_encode($this->response);
	}
}
?>
