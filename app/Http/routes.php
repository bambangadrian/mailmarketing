<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(
    ['prefix' => 'admin',],
    function () {
        Route::group(
            ['middleware' => ['auth', 'acl']],
            function () {
                Route::get('test', 'TestController@index');
                Route::resource('user', 'UserController');
                Route::resource('profile', 'ProfileController');
                Route::resource('import', 'ImportFromController');
                Route::resource('subscriber', 'SubscriberController');
                Route::resource('criteria', 'SegmentCriteriaController');
                Route::resource('segment', 'SegmentController');
                Route::resource('template', 'TemplateController');
                Route::resource('maillist', 'MailListController');
                Route::resource('maillist/group', 'SubscriberGroupController');
                Route::resource('trackstatus', 'TrackingStatusController');
                Route::resource('campaign', 'CampaignController');
                Route::resource('schedule', 'CampaignScheduleController');
                Route::resource('mail/tracking', 'MailTrackingController');
                Route::resource('report/tracking', 'SentMailController');
                Route::resource('company', 'CompanyController');
                Route::get('dashboard', 'DashboardController@index');
                Route::get('logout', 'Auth\AuthController@doLogout');
            }
        );
        Route::get('login', 'Auth\AuthController@getLogin');
        Route::post('login', 'Auth\AuthController@doAuth');
        Route::get('resetpwd', 'Auth\PasswordController@getResetPassword');
        Route::post('resetpwd', 'Auth\PasswordController@doResetPassword');
    }
);