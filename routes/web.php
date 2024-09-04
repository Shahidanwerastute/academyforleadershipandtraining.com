<?php
/** PHP Artisan Command**/

use App\SurveySubmission;

Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    echo '<p>Cache cleared</p><br>';
    //Clear View cache:
    $exitCode = Artisan::call('view:clear');
    echo '<p>View cache cleared</p><br>';
    //Clear Config cache:
    $exitCode = Artisan::call('config:cache');
    echo '<p>Config cache cleared</p><br>';
});

/*Auth Routes*/

Auth::routes();
$a = 'auth.';
Auth::routes();
Route::post('/reset/password', ['as' => 'reset.password', 'uses' => 'Auth\ResetPasswordController@reset']);
Route::get('/logout', ['as' => $a . 'logout', 'uses' => 'Auth\LoginController@logout']);

/*Admin Route*/
Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'as' => 'admin-'], function () {
    Route::group(['middleware' => ['auth', 'group', 'clearance']], function () {
        /*Profile Information*/
        Route::match(['get', 'post'], 'profile/edit', ['as' => 'edit-profile', 'uses' => 'profile\Profile@edit']);
        Route::post('credentials', ['as' => 'credentials', 'uses' => 'profile\Profile@credentials']);
        /*Manage Roles*/
        Route::match(['get', 'post'], 'manage/roles', ['as' => 'role', 'uses' => 'role\Role@index']);
        Route::post('role/create', ['as' => 'role-create', 'uses' => 'role\Role@create']);
        Route::post('role/update', ['as' => 'role-update', 'uses' => 'role\Role@update']);
        Route::post('role/delete', ['as' => 'role-delete', 'uses' => 'role\Role@delete']);
        Route::post('role/listing', ['as' => 'role-listing', 'uses' => 'role\Role@listing']);
        Route::post('roles', ['as' => 'roles', 'uses' => 'role\Role@roles']);
        /*User Settings*/
        Route::match(['get', 'post'], 'manage/users', ['as' => 'user', 'uses' => 'user\User@index']);
        Route::post('user/create', ['as' => 'user-create', 'uses' => 'user\User@create']);
        Route::post('user/update', ['as' => 'user-update', 'uses' => 'user\User@update']);
        Route::post('user/delete', ['as' => 'user-delete', 'uses' => 'user\User@delete']);
        Route::post('user/listing', ['as' => 'user-listing', 'uses' => 'user\User@listing']);
        /* Manage Employee*/
        Route::match(['get', 'post'], 'manage/employees', ['as' => 'employee', 'uses' => 'employee\Employee@index']);
        Route::post('employee/create', ['as' => 'employee-create', 'uses' => 'employee\Employee@create']);
        Route::post('employee/update', ['as' => 'employee-update', 'uses' => 'employee\Employee@update']);
        Route::post('employee/delete', ['as' => 'employee-delete', 'uses' => 'employee\Employee@delete']);
        Route::post('employee/listing', ['as' => 'employee-listing', 'uses' => 'employee\Employee@listing']);
        Route::post('employee/invitation', ['as' => 'employee-invitation', 'uses' => 'employee\Employee@invitation']);
        Route::post('employee/invitations', ['as' => 'employee-invitations', 'uses' => 'employee\Employee@invitations']);
        Route::post('employee/import', ['as' => 'employee-import', 'uses' => 'employee\Employee@import']);
        /*Manage Categories*/
        Route::match(['get', 'post'], 'manage/categories', ['as' => 'category', 'uses' => 'category\Category@index']);
        Route::post('category/create', ['as' => 'category-create', 'uses' => 'category\Category@create']);
        Route::post('category/update', ['as' => 'category-update', 'uses' => 'category\Category@update']);
        Route::post('category/delete', ['as' => 'category-delete', 'uses' => 'category\Category@delete']);
        Route::post('category/listing', ['as' => 'category-listing', 'uses' => 'category\Category@listing']);
        Route::post('categories', ['as' => 'categories', 'uses' => 'category\Category@categories']);
        Route::match(['get', 'post'], 'category/sorting', ['as' => 'category-sorting', 'uses' => 'category\Category@sorting']);
        /*Manage sessions ahmed*/
        Route::match(['get', 'post'], 'manage/sessions', ['as' => 'session', 'uses' => 'session\Sessions@index']);
        Route::post('session/create', ['as' => 'session-create', 'uses' => 'session\Sessions@create']);
        Route::post('session/update', ['as' => 'session-update', 'uses' => 'session\Sessions@update']);
        Route::post('session/delete', ['as' => 'session-delete', 'uses' => 'session\Sessions@delete']);
        Route::match(['get', 'post'], '/session/survey/{session_id?}', ['as' => 'session-survey', 'uses' => 'session\Sessions@survey']);
        Route::post('session/listing', ['as' => 'session-listing', 'uses' => 'session\Sessions@listing']);
        Route::post('sessions', ['as' => 'sessions', 'uses' => 'session\Sessions@sessions']);
        Route::match(['get', 'post'], 'session/sorting', ['as' => 'session-sorting', 'uses' => 'session\Sessions@sorting']);
        Route::match(['get', 'post'], 'session/file_upload', ['as' => 'session-file-upload', 'uses' => 'session\Sessions@session_file_upload']);
        Route::post('session_survey/result', ['as' => 'session-survey-result', 'uses' => 'session\Sessions@result']);
        Route::post('session_survey/aggregate_result', ['as' => 'session-survey-aggregate', 'uses' => 'session\Sessions@aggregate_result']);
        Route::post('session_survey/update_friend_info', ['as' => 'session-survey-update-friend-info', 'uses' => 'session\Sessions@update_friend_info']);
        /*Manage Survey*/
        Route::match(['get', 'post'], 'manage/surveys', ['as' => 'survey', 'uses' => 'survey\Survey@index']);
        Route::post('survey/create', ['as' => 'survey-create', 'uses' => 'survey\Survey@create']);
        Route::post('survey/update', ['as' => 'survey-update', 'uses' => 'survey\Survey@update']);
        Route::post('survey/delete', ['as' => 'survey-delete', 'uses' => 'survey\Survey@delete']);
        Route::post('survey/listing', ['as' => 'survey-listing', 'uses' => 'survey\Survey@listing']);
        Route::match(['get', 'post'], 'manage/submissions/{parent_assessment_id?}', ['as' => 'submissions', 'uses' => 'survey\Survey@submissions']);
        Route::get('reminder/{parent_assessment_id?}/{group_id?}', ['as' => 'reminder', 'uses' => 'survey\Survey@reminder']);
        Route::get('friend/reminder/{employee_id?}', ['as' => 'friend-reminder', 'uses' => 'survey\Survey@friend_reminder']);
        Route::get('employee_reminder/{employee_id?}', ['as' => 'employee-reminder', 'uses' => 'survey\Survey@employee_reminder']);
        Route::get('invitation_email/{session_id?}', ['as' => 'invitation-email', 'uses' => 'session\Sessions@invitation_email']);
        Route::get('session_reminder/{session_id?}', ['as' => 'session-reminder', 'uses' => 'session\Sessions@session_reminder_email']);
        Route::get('session/avg_email/{survey_id?}/{group_id?}/{session_id?}/{employee_id?}', ['as' => 'avg-email', 'uses' => 'session\Sessions@send_avg_email']);
        Route::get('survey/report/{survey_id?}/{group_id?}/{session_id?}/{employee_id?}', ['as' => 'generate-survey-avg-pdf', 'uses' => 'session\Sessions@generate_survey_avg_pdf']);
        Route::get('session_survey/export/{session_id?}', ['as' => 'session-survey-export', 'uses' => 'session\Sessions@file_export']);
        Route::get('survey/export', ['as' => 'survey-export', 'uses' => 'survey\Survey@file_export']);
        Route::post('survey/download', ['as' => 'survey-download', 'uses' => 'survey\Survey@download']);
        Route::post('survey/copy', ['as' => 'survey-copy', 'uses' => 'survey\Survey@copy']);
        Route::match(['get', 'post'], 'survey/sorting/{survey_id?}', ['as' => 'survey-sorting', 'uses' => 'survey\Survey@sorting']);
        Route::post('survey/result', ['as' => 'survey-result', 'uses' => 'survey\Survey@result']);
        Route::post('survey/aggregate', ['as' => 'survey-aggregate', 'uses' => 'survey\Survey@aggregate']);
        /* Manage Coupon Codes*/
        Route::match(['get', 'post'], 'manage/coupons', ['as' => 'coupon', 'uses' => 'coupon\Coupon@index']);
        Route::post('coupon/create', ['as' => 'coupon-create', 'uses' => 'coupon\Coupon@create']);
        Route::post('coupon/update', ['as' => 'coupon-update', 'uses' => 'coupon\Coupon@update']);
        Route::post('coupon/delete', ['as' => 'coupon-delete', 'uses' => 'coupon\Coupon@delete']);
        /* Manage PDF Content*/
        Route::get('manage/pdfs', ['as' => 'pdf', 'uses' => 'pdf\Pdf@index']);
        Route::match(['get', 'post'], 'pdf/update/{id}', ['as' => 'pdf-update', 'uses' => 'pdf\Pdf@update']);
        /*New PDFs*/
        Route::get('manage/friends/pdfs', ['as' => 'new-pdf', 'uses' => 'pdf\Pdf@friends_index']);
        Route::match(['get', 'post'], 'friends/pdf/update/{id}', ['as' => 'new-pdf-update', 'uses' => 'pdf\Pdf@friends_update']);
        /*Manage Blogs*/
        Route::match(['get', 'post'], 'manage/blogs', ['as' => 'blog', 'uses' => 'blog\Blog@index']);
        Route::post('blog/create', ['as' => 'blog-create', 'uses' => 'blog\Blog@create']);
        Route::post('blog/update', ['as' => 'blog-update', 'uses' => 'blog\Blog@update']);
        Route::post('blog/delete', ['as' => 'blog-delete', 'uses' => 'blog\Blog@delete']);
        Route::post('blog/listing', ['as' => 'blog-listing', 'uses' => 'blog\Blog@listing']);
        /*Manage Instructors*/
        Route::match(['get', 'post'], 'manage/instructors', ['as' => 'instructor', 'uses' => 'instructor\Instructor@index']);
        Route::post('instructor/create', ['as' => 'instructor-create', 'uses' => 'instructor\Instructor@create']);
        Route::post('instructor/update', ['as' => 'instructor-update', 'uses' => 'instructor\Instructor@update']);
        Route::post('instructor/delete', ['as' => 'instructor-delete', 'uses' => 'instructor\Instructor@delete']);
        Route::post('instructor/listing', ['as' => 'instructor-listing', 'uses' => 'instructor\Instructor@listing']);
        Route::post('instructors', ['as' => 'instructors', 'uses' => 'instructor\Instructor@instructors']);
        /*Manage Courses*/
        Route::match(['get', 'post'], 'manage/courses', ['as' => 'course', 'uses' => 'course\Course@index']);
        Route::post('course/create', ['as' => 'course-create', 'uses' => 'course\Course@create']);
        Route::post('course/update', ['as' => 'course-update', 'uses' => 'course\Course@update']);
        Route::post('course/delete', ['as' => 'course-delete', 'uses' => 'course\Course@delete']);
        Route::post('course/listing', ['as' => 'course-listing', 'uses' => 'course\Course@listing']);
        Route::match(['get', 'post'],'course/sorting',['as' => 'course-sorting', 'uses' => 'course\Course@sorting']);
        Route::match(['get', 'post'],'autocomplete/courses',['as' => 'autocomplete-course', 'uses' => 'course\Course@courses']);
        /*Manage Payments*/
        Route::match(['get', 'post'], 'manage/payments/{status}', ['as' => 'payment', 'uses' => 'payment\Payment@index']);
        Route::post('payment/delete', ['as' => 'payment-delete', 'uses' => 'payment\Payment@delete']);
        Route::post('payment/listing', ['as' => 'payment-listing', 'uses' => 'payment\Payment@listing']);
        /*Manage Reviews*/
        Route::get('manage/reviews', ['as' => 'review', 'uses' => 'review\Review@index']);
        Route::post('review/delete', ['as' => 'review-delete', 'uses' => 'review\Review@delete']);
        Route::post('review/listing', ['as' => 'review-listing', 'uses' => 'review\Review@listing']);

        Route::match(['get', 'post'], 'manage/rater-email-fields', ['as' => 'rater-email-fields', 'uses' => 'setting\GeneralSetting@rater_email_fields']);
    });
});
Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'as' => 'admin-'], function () {
    Route::group(['middleware' => ['auth', 'group', 'administrator']], function () {
        /*Manage Groups*/
        Route::match(['get', 'post'], 'manage/groups', ['as' => 'group', 'uses' => 'group\Group@index']);
        Route::post('group/create', ['as' => 'group-create', 'uses' => 'group\Group@create']);
        Route::post('group/update', ['as' => 'group-update', 'uses' => 'group\Group@update']);
        Route::post('group/delete', ['as' => 'group-delete', 'uses' => 'group\Group@delete']);
        Route::post('group/listing', ['as' => 'group-listing', 'uses' => 'group\Group@listing']);
        Route::post('groups', ['as' => 'groups', 'uses' => 'group\Group@groups']);
        /*Manage Permissions*/
        Route::match(['get', 'post'], 'manage/permissions', ['as' => 'permission', 'uses' => 'permission\Permission@index']);
        Route::post('permission/create', ['as' => 'permission-create', 'uses' => 'permission\Permission@create']);
        Route::post('permission/update', ['as' => 'permission-update', 'uses' => 'permission\Permission@update']);
        Route::post('permission/delete', ['as' => 'permission-delete', 'uses' => 'permission\Permission@delete']);
        Route::post('permission/listing', ['as' => 'permission-listing', 'uses' => 'permission\Permission@listing']);
        /*Setting*/
        Route::match(['get', 'post'], 'setting/smtp', ['as' => 'setting-smtp', 'uses' => 'setting\Smtp@index']);
        Route::match(['get', 'post'], 'general/setting', ['as' => 'general-setting', 'uses' => 'setting\GeneralSetting@index']);
        /*Switch Group*/
        Route::post('group/switch', ['as' => 'group-switch', 'uses' => 'group\Group@switch']);

    });
});
/*For both Administrator & Users*/
Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'as' => 'admin-'], function () {
    Route::group(['middleware' => ['auth', 'group']], function () {
        /*Manage Permissions*/
        Route::post('permissions', ['as' => 'permissions', 'uses' => 'permission\Permission@permissions']);

        /*Dashboard*/
        Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'dashboard\Dashboard@index']);

        /*To make table field active*/
        Route::post('field/active', ['as' => 'field-active', 'uses' => 'Controller@active']);
    });
});

/*Front Theme Routes*/
Route::group(['namespace' => 'theme', 'as' => 'theme-'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'home\Home@index']);
    Route::get('/leadership_training', ['as' => 'leadership-training', 'uses' => 'page\Page@leadership_training']);
    Route::get('/executive_coaching', ['as' => 'executive-coaching', 'uses' => 'page\Page@executive_coaching']);
    Route::get('/consulting', ['as' => 'consulting', 'uses' => 'page\Page@consulting']);
    Route::get('/communications_assessment', ['as' => 'communications-assessment', 'uses' => 'page\Page@communications_assessment']);
    Route::get('/about', ['as' => 'about', 'uses' => 'page\Page@about']);
    Route::get('/Resources', ['as' => 'resources', 'uses' => 'page\Page@resources']);
    Route::match(['get', 'post'], '/contact', ['as' => 'contact', 'uses' => 'page\Page@contact']);
    Route::match(['get', 'post'], '/blog/{type?}', ['as' => 'blog', 'uses' => 'page\Page@blog']);
    Route::match(['get', 'post'], '/blog/detail/{id}/{title}', ['as' => 'blog-detail', 'uses' => 'page\Page@blog_detail']);
    Route::match(['get', 'post'], '/worst_practices_in_corporate_training', ['as' => 'worst_practices_in_corporate_training', 'uses' => 'page\Page@worst_practices_in_corporate_training']);
    Route::match(['get', 'post'], '/clients', ['as' => 'clients', 'uses' => 'page\Page@clients']);
    Route::match(['get', 'post'], '/training', ['as' => 'training', 'uses' => 'page\Page@training']);
    Route::get('/courses', ['as' => 'courses', 'uses' => 'course\Course@index']);
    Route::get('/course/{id}/{title}', ['as' => 'course-detail', 'uses' => 'course\Course@detail']);
    Route::match(['get', 'post'], '/course/payment/personal/detail/{id}/{title}', ['as' => 'course-payment-personal-detail', 'uses' => 'course\Course@payment_personal_detail']);
    Route::match(['get', 'post'], '/course/request/{id}/{title}', ['as' => 'course-request', 'uses' => 'course\Course@request']);
    Route::match(['get', 'post'], '/course/registration/bankcheck/{id}/{title}', ['as' => 'course-registration-bankcheck', 'uses' => 'course\Course@bankcheck']);
    Route::get('/course/payment/form/{id}/{title}', ['as' => 'course-payment-form', 'uses' => 'course\Course@payment_form']);
    Route::get('/course/payment/process/{id}/{title}', ['as' => 'course-payment-process', 'uses' => 'course\Course@payment_process']);
    Route::post('/coupon', ['as' => 'coupon', 'uses' => 'course\Course@coupon']);
    Route::get('/term-and-conditions', ['as' => 'tos', 'uses' => 'page\Page@tos']);
    Route::get('/privacy-policy', ['as' => 'privacy-policy', 'uses' => 'page\Page@privacy_policy']);
    Route::get('/video-gallery', ['as' => 'video-gallery', 'uses' => 'page\Page@video_gallery']);
});

/*Front End Survey Routes*/
Route::group(['prefix' => 'assessment', 'namespace' => 'catalog', 'as' => 'catalog-'], function () {
    Route::match(['get', 'post'], '/survey', ['as' => 'rootpath', 'uses' => 'survey\Survey@index']);
    Route::match(['get', 'post'], '/survey_file', ['as' => 'survey-file', 'uses' => 'survey\Survey@survey_file_upload']);
    Route::match(['get', 'post'], '/survey/{code}', ['as' => 'survey-form', 'uses' => 'survey\Survey@index']);
    Route::match(['get', 'post'], '/survey/employee_friend/assessment/{id?}/{session_id?}', ['as' => 'survey-employee-friend-assessment-form', 'uses' => 'survey\Survey@index']);
    Route::match(['get', 'post'], '/survey/friend/assessment/{id}', ['as' => 'survey-friend-assessment-form', 'uses' => 'survey\Survey@index']);
    Route::match(['get', 'post'], '/survey/employee/assessment/{id?}/{session_id?}', ['as' => 'survey-employee-assessment-form', 'uses' => 'survey\Survey@index']);
    /*Thank you*/
    Route::get('/thank-you/{id}', ['as' => 'thank-you', 'uses' => 'survey\Survey@thanku']);
    Route::get('/friend-thank-you/{id}', ['as' => 'friend-thank-you', 'uses' => 'survey\Survey@friend_thanku']);
    /*Payment Routes*/
    Route::get('/payment/paypal/{status?}', ['as' => 'paypal-payment', 'uses' => 'payment\PaymentController@index']);
    Route::get('/payment/credit-card/{status?}', ['as' => 'credit-card-payment', 'uses' => 'payment\PaymentController@credit_card']);
    Route::get('/payment/status', ['as' => 'paypal-status', 'uses' => 'payment\PaymentController@getPaymentStatus']);
    /*Coupons Routes*/
    Route::post('coupon/code', ['as' => 'coupon-code', 'uses' => 'survey\Survey@code']);
});

/*Blog Review Routes*/
Route::post('blog/review/write', ['as' => 'blog-review-write', 'uses' => 'admin\blog\Blog@review_write']);

Route::post('survey/upload/resource', ['as' => 'upload', 'uses' => 'Upload@upload']);
Route::post('survey/switch/language', ['as' => 'language', 'uses' => 'Language@language']);
Route::get('command', ['as' => 'command', 'uses' => 'Command@index']);

/*Field active*/
Route::post('field/active', ['as' => 'field-active', 'uses' => 'Controller@active']);

Route::get('test', function () {

});

Route::get('check-survey-logs-details/{id?}', function ($id = null) {
    $query = DB::table('servey_submission_form_data');
    if ($id){
        $query = $query->where('survey_submission_id', $id);
        $survey_data = $query->first();
    }else{
        $survey_data = $query->orderBy('id', 'DESC')->get();
    }
//    $survey_data = DB::table('servey_submission_form_data')->get();
    dd($survey_data);
});


Route::get('fix-survey-submission/{id?}', function ($id = null) {
   try {
       $query = DB::table('servey_submission_form_data');
       $survey_submission_form_data = $query->where('survey_submission_id', $id)->first();
       $survey_submission_form_data = json_decode($survey_submission_form_data->form_data, true);
       unset($survey_submission_form_data['_token'], $survey_submission_form_data['first_name'], $survey_submission_form_data['last_name'], $survey_submission_form_data['email'], $survey_submission_form_data['mobile'], $survey_submission_form_data['czContainer_czMore_txtCount'], $survey_submission_form_data['invite']);

       $b = $a = $l = $r = 0;
       foreach ($survey_submission_form_data as $key => $value) {
           if(strtolower($value) == "a") $a++;
           else if(strtolower($value) == "b") $b++;
           else if(strtolower($value) == "l") $l++;
           else if(strtolower($value) == "r") $r++;
       }

       $h_value = $r-$l;
       $v_value = $a-$b;
       $h_value = ($h_value < 0 ? $h_value: '+'.$h_value);
       $v_value = ($v_value < 0 ? $v_value: '+'.$v_value);
       $h_sign = (str_contains($h_value, '-') ? '-' : '+');
       $v_sign = (str_contains($v_value, '-') ? '-' : '+');
       $record = DB::table('score')->where('h', $h_sign)->where('v', $v_sign)->first();
       $sub_quadrant = DB::table('sub_quadrant')
           ->where('h', 'like', '%' . $h_value . '%')
           ->where('v', 'like', '%' . $v_value . '%')
           ->first();

       $submission = SurveySubmission::find($id);
       $submission->a = $a;
       $submission->b = $b;
       $submission->l = $l;
       $submission->r = $r;
       $submission->image = $record ? strtolower($record->behavior).'.png' : NULL;
       $submission->behavior = $record ? strtolower($record->behavior) : NULL;
       $submission->sub_behavior = $sub_quadrant ? strtolower($sub_quadrant->behavior) : NULL;
       $submission->save();
   } catch (Exception $e) {
       echo $e->getMessage();die;
   }
});
