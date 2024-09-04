<?php
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*Customer Auth Routes*/

Route::group(['prefix' => 'customer'], function () {
	Route::post('login', 'API\Authentication@login');
	Route::post('register', 'API\Registration@register');
	Route::post('/password/email',['as' => 'password-email','uses' => 'API\Forgot@sendResetLinkEmail']);
	Route::post('/password/reset',['as' => 'reset','uses' => 'API\Reset@reset']);
	Route::get('/password/reset/{token}',['as' => 'password-reset','uses' => 'API\Reset@showResetForm']);
});
//Route::get('/logout',['as' => 'logout','uses' => 'CustomerLoginController@logout']);

/*Customer Routes*/
Route::group(['middleware' => 'auth:api', 'prefix' => 'customer', 'namespace' => 'customer', 'as' => 'customer-'], function () {
	/*Logged Customer Routes*/
	Route::get('/detail',['as' => 'index', 'uses' => 'Customer@index']);
	Route::post('/profile',['as' => 'profile', 'uses' => 'Customer@profile']);
	Route::post('/amount',['as' => 'amount', 'uses' => 'Customer@amount']);

});
Route::group(['prefix' => 'customer', 'namespace' => 'customer', 'as' => 'customer-'], function () {

});