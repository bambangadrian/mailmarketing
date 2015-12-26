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
                Route::resource('master/user', 'Admin\UserController');
                Route::resource('master/profile', 'Admin\ProfileController');
                Route::resource('master/import', 'Admin\ImportFromController');
                Route::resource('master/template', 'Admin\TemplateController');
                Route::resource('master/trackstatus', 'Admin\TrackingStatusController');
                Route::resource('master/segment', 'Admin\SegmentController');
                Route::resource('master/segmentCriteria', 'Admin\SegmentCriteriaController');
                Route::resource('master/campaignCategory', 'Admin\CampaignCategoryController');
                Route::resource('master/campaignType', 'Admin\CampaignTypeController');
                Route::resource('master/campaignTopic', 'Admin\CampaignTopicController');
                Route::resource('master/randomIndex', 'Admin\RandomIndexController');
                Route::resource('mail/campaign', 'Admin\CampaignController');
                Route::resource('mail/subscriber', 'Admin\SubscriberController');
                Route::resource('mail/maillist', 'Admin\MailListController');
                Route::resource('mail/subscriberGroup', 'Admin\SubscriberGroupController');
                Route::resource('mail/schedule', 'Admin\CampaignScheduleController');
                Route::resource('mail/tracking', 'Admin\MailTrackingController');
                Route::resource('mail/sentMail', 'Admin\SentMailController');
                Route::resource('mail/trackingReport', 'Admin\TrackingReportController');
                Route::resource('dss/period', 'Admin\Dss\DssPeriodController');
                Route::resource('dss/criteria', 'Admin\Dss\DssCriteriaController');
                Route::resource('dss/alternative', 'Admin\Dss\DssAlternativeController');
                Route::resource('dss/consistency', 'Admin\Dss\DssConsistencyController');
                Route::resource('dss/priority', 'Admin\Dss\DssPriorityController');
                Route::resource('dss/result', 'Admin\Dss\DssResultController');
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