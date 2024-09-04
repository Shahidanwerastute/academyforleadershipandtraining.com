<?php
namespace App\Http\Controllers\admin\setting;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\Controller;
use App\GeneralSetting as GeneralSettingModel;
use App\RaterEmailField as RaterEmailFieldModel;
use DB, View, Validator, Route, Auth, File, Carbon\Carbon, Mail, URL, Excel;
class GeneralSetting extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index(Request $request) {
        $this->data['setting'] = GeneralSettingModel::first();
        if ($request->isMethod('post') && $request->ajax()) {
            $attributes = array(
				'title' => 'Title',
				'logo' => 'Logo',
				'survey_price' => 'Price',
            );
            $validator = Validator::make($request->all(), [
				'title' => 'bail|required',
				'logo' => 'bail|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
				'survey_price' => 'bail|required|numeric',
				'friend_assessment_price' => 'bail|numeric',
            ], [], $attributes);
            if ($validator->passes()) {
                if ($request->logo) {
                    $this->data['setting']->logo = upload_image(array("file" => $request->logo, "dir" => 'public/assets/admin/images/', "name" => 'logo.' . $request->logo->getClientOriginalExtension(),));
                }
                $this->data['setting']->title = $request->title;
                /* $this->data['setting']->description = $request->description;
                $this->data['setting']->keywords = $request->keywords; */
                $this->data['setting']->survey_price = $request->survey_price;
				$this->data['setting']->friend_assessment_price = $request->friend_assessment_price;
				$this->data['setting']->logo_url = $request->logo_url;
                $this->data['setting']->save();
                return response()->json(['success' => 1, 'message' => 'General setting updated successfully.', ]);
            }
            return response()->json(['success' => 0, 'error' => $validator->errors(), ]);
        }
        return View::make('admin.setting.general-setting')->with('data', $this->data);
    }

    public function rater_email_fields(Request $request) {
        $this->data['rater_email_fields'] = RaterEmailFieldModel::first();

        if ($request->isMethod('post') && $request->ajax()) {
            $this->data['rater_email_fields']->field_1 = $request->field_1;
            $this->data['rater_email_fields']->field_2 = $request->field_2;
            $this->data['rater_email_fields']->save();
            return response()->json(['success' => 1, 'message' => 'Data updated successfully.', ]);
        }
        return View::make('admin.setting.rater-email-fields')->with('data', $this->data);
    }
}
