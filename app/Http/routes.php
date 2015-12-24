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
                Route::get('test', 'Admin\TestController@index');
                Route::resource('master/user', 'Admin\UserController');
                Route::resource('master/profile', 'Admin\ProfileController');
                Route::resource('master/import', 'Admin\ImportFromController');
                Route::resource('master/template', 'Admin\TemplateController');
                Route::resource('master/trackstatus', 'Admin\TrackingStatusController');
                Route::resource('master/segment', 'Admin\SegmentController');
                Route::resource('master/segmentCriteria', 'Admin\SegmentCriteriaController');
                Route::resource('mail/campaign', 'Admin\CampaignController');
                Route::resource('mail/subscriber', 'Admin\SubscriberController');
                Route::resource('mail/maillist', 'Admin\MailListController');
                Route::resource('mail/subscriberGroup', 'Admin\SubscriberGroupController');
                Route::resource('mail/schedule', 'Admin\CampaignScheduleController');
                Route::resource('mail/tracking', 'Admin\MailTrackingController');
                Route::resource('mail/trackingReport', 'Admin\SentMailController');
                Route::resource('dss/period', 'Admin\DssPeriodController');
                Route::resource('dss/criteria', 'Admin\DssCriteriaController');
                Route::resource('dss/alternative', 'Admin\DssAlternativeController');
                Route::resource('dss/consistency', 'Admin\DssConsistencyController');
                Route::resource('dss/priority', 'Admin\DssPriorityController');
                Route::resource('dss/result', 'Admin\DssResultController');
                Route::resource('company', 'Admin\CompanyController');
                Route::get('dashboard', 'Admin\DashboardController@index');
                Route::get('logout', 'Admin\Auth\AuthController@doLogout');
            }
        );
        Route::get('login', 'Admin\Auth\AuthController@getLogin');
        Route::post('login', 'Admin\Auth\AuthController@doAuth');
        Route::get('resetpwd', 'Admin\Auth\PasswordController@getResetPassword');
        Route::post('resetpwd', 'Admin\Auth\PasswordController@doResetPassword');
    }
);