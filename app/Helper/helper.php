<?php

use App\SurveySubmission;
use Spatie\Permission\Models\Role;
use App\SurveyField;
use App\FriendAssessment;
use App\Course;
use App\Instructor;

function errorMsg($errorMsg)
{
    return '<div class="parsley-errors-list filled"><span class="parsley-required">' . $errorMsg . '</span></div>';
}
function upload_image($data)
{
    if (!File::isDirectory($data['dir'])) File::makeDirectory($data['dir'], $mode = 0777, true, true);
    $image = Image::make($data['file']->getRealPath());
    if($data['width'] && $data['height'] && $data['height'] == "auto") {
        $image->resize($data['width'], null, function ($constraint) {
            $constraint->aspectRatio();
        });
    } else if($data['width'] && $data['height'] && $data['width'] == "auto") {
        $image->resize(null, $data['height'], function ($constraint) {
            $constraint->aspectRatio();
        });
    } else if($data['width'] && $data['height']) {
        $image = $image->fit($data['width'], $data['height']);
    }
    $image = $image->save($data['dir'] . $data['name']);
    return $data['name'];

}
function set_error_delimeter($errors)
{
    $array = array();
    if (count($errors) > 0)
    {
        foreach ($errors as $error)
        {
            array_push($array, '<p>' . $error . '</p>');
        }
    }
    return $array;
}
function n2e($value)
{
    if (isset($value)) return $value;
    else return '';
}
function roles()
{
    return Role::all();
}
function delete_file($files)
{
    foreach($files as $key => $value)
    {
        if(File::isFile($value)){
            \File::delete($value);
        }
    }
}
function questions($survey_id)
{
    $data = SurveyField::leftJoin('category', 'category.id', '=', 'survey_field.category_id')
        ->where('survey_field.survey_id', $survey_id)
        ->where('survey_field.active', 1)
        ->orderBy('display_order', 'ASC')
        ->select("survey_field.*")
        ->get();
    return $data;
}

function friends($group, $survey_submission_id)
{
    $query = FriendAssessment::join('survey_submission', function ($join) {
        $join->on('survey_submission.id', '=', 'friend_assessment.survey_submission_id');
    });
    /* ->where('survey_submission.survey_id', $this->data['survey']
    ->id) */
    $query->where('friend_assessment.survey_submission_id', $survey_submission_id);
    $query->where('survey_submission.group_id', $group->id);
    if($group->id == 1) $query->where('survey_submission.p_status', 1);
    $query->whereNull('survey_submission.parent_assessment_id');
    return $query->get();
}

function courses($limit, $can_register)
{
    $query = Course::query();
    $query->limit($limit);
    $query->where("can_register", $can_register);
    $query->where("status", 1);
    $query->orderBy("display_order","ASC");
    $query->orderBy("created_at","DESC");
    $query->select("*");
    return $query->get();
}

function check_friend_submissions($group, $survey_submission_id)
{

    $query = FriendAssessment::join('survey_submission', function ($join) {
        $join->on('survey_submission.id', '=', 'friend_assessment.survey_submission_id');
    });
    /* ->where('survey_submission.survey_id', $this->data['survey']
    ->id) */
    $query->select('friend_assessment.*');
    $query->where('friend_assessment.survey_submission_id', $survey_submission_id);
    $query->where('survey_submission.group_id', $group);
    if($group == 1) $query->where('survey_submission.p_status', 1);
    $query->whereNull('survey_submission.parent_assessment_id');
    return $query->get();
}

function get_employee_detail_via_survay_id($survey_id){
    $query = SurveySubmission::join('employee', function ($join) {
        $join->on('employee.id', '=', 'survey_submission.employee_id');
    });
    $query->where('survey_submission.parent_assessment_id', $survey_id);

    return $query->get();
}

function get_submission_detail_via_survay_id($survey_id){
    $query = SurveySubmission::join('employee', function ($join) {
        $join->on('employee.id', '=', 'survey_submission.employee_id');
    });
    $query->where('survey_submission.id', $survey_id);

    return $query->first();
}

function employee_friends($employee_id)
{
    DB::connection()->enableQueryLog();
    $query = FriendAssessment::query();
    $query->leftjoin('survey_submission', function ($join) {
        $join->on('survey_submission.id', '=', 'friend_assessment.survey_submission_id');
    });
    $query->where('friend_assessment.employee_id', $employee_id);
    $query->whereNull('survey_submission.parent_assessment_id');
    $query->select('survey_submission.*', 'friend_assessment.*');
    return $query->get();
}
function employee_friends_for_email($employee_id)
{
    DB::connection()->enableQueryLog();
    $query = FriendAssessment::query();
    $query->leftjoin('survey_submission', function ($join) {
        $join->on('survey_submission.id', '=', 'friend_assessment.survey_submission_id');
    });
    $query->where('friend_assessment.employee_id', $employee_id);
    $query->whereNull('survey_submission.parent_assessment_id');
    $query->select("friend_assessment.*");
    $query->get();
    return $query->get();
}
function employee_all_friends($employee_id)
{
    DB::connection()->enableQueryLog();
    $query = FriendAssessment::query();
    $query->where('friend_assessment.employee_id', $employee_id);

    return $query->get();
}
function get_friend_detail_via_id($employee_friend_id){
    $query = FriendAssessment::query();
    $query->where('friend_assessment.id', $employee_friend_id);

    return $query->get();
}

function echo_($str) {
    echo $str;die;
}

function debug_() {
    echo time();die;
}

function dump_($data) {
    echo '<pre>';print_r($data);die;
}

function enable_query_log()
{
    app('db')->enableQueryLog();
    return true;
}

function get_query_log($show_all = false)
{
    $q = app('db')->getQueryLog();
    foreach ($q as $key => $value) {
        $q[$key]["parsed_query"] = vsprintf(str_replace('?', "'%s'", $value['query']), $value['bindings']);
    }
    if ($show_all):
        debug($q);
    else:
        echo $q[count($q) - 1]['parsed_query'];
        exit();
    endif;
}

function isEmptyRow($row) {
    foreach($row as $cell){
        if (null !== $cell) return false;
    }
    return true;
}

function get_course_instructors_info($instructor_ids) {
    if ($instructor_ids) {
        $instructors = Instructor::whereIn('id', explode(',', $instructor_ids))->get();
        return ($instructors ?: []);
    }
    return [];
}
?>