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
                $resourceOption = [];
                Route::resource('master/user', 'Admin\UserController', $resourceOption);
                Route::resource('master/profile', 'Admin\ProfileController', $resourceOption);
                Route::resource('master/import', 'Admin\ImportFromController', $resourceOption);
                Route::resource('master/template', 'Admin\TemplateController', $resourceOption);
                Route::resource('master/trackstatus', 'Admin\TrackingStatusController', $resourceOption);
                Route::resource('master/segment', 'Admin\SegmentController', $resourceOption);
                Route::resource('master/segmentCriteria', 'Admin\SegmentCriteriaController', $resourceOption);
                Route::resource('master/campaignCategory', 'Admin\CampaignCategoryController', $resourceOption);
                Route::resource('master/campaignType', 'Admin\CampaignTypeController', $resourceOption);
                Route::resource('master/campaignTopic', 'Admin\CampaignTopicController', $resourceOption);
                Route::resource('master/randomIndex', 'Admin\RandomIndexController', $resourceOption);
                Route::resource('mail/campaign', 'Admin\CampaignController', $resourceOption);
                Route::resource('mail/subscriber', 'Admin\SubscriberController', $resourceOption);
                Route::resource('mail/maillist', 'Admin\MailListController', $resourceOption);
                Route::resource('mail/subscriberGroup', 'Admin\SubscriberGroupController', $resourceOption);
                Route::resource('mail/schedule', 'Admin\CampaignScheduleController', $resourceOption);
                Route::resource('mail/tracking', 'Admin\MailTrackingController', $resourceOption);
                Route::resource('mail/sentMail', 'Admin\SentMailController', $resourceOption);
                Route::resource('mail/trackingReport', 'Admin\TrackingReportController', $resourceOption);
                Route::resource('dss/period', 'Admin\Dss\DssPeriodController', $resourceOption);
                Route::resource('dss/criteria', 'Admin\Dss\DssCriteriaController');
                Route::resource('dss/alternative', 'Admin\Dss\DssAlternativeController', $resourceOption);
                Route::resource('dss/consistency', 'Admin\Dss\DssConsistencyController', $resourceOption);
                Route::resource('dss/priority', 'Admin\Dss\DssPriorityController', $resourceOption);
                Route::resource('dss/result', 'Admin\Dss\DssResultController', $resourceOption);
                Route::resource('company', 'Admin\CompanyController', $resourceOption);
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
Route::resource('register', 'RegistrationController');
Route::get(
    'test/mail',
    function () {
        Mail::raw(
            'Laravel with Mailgun is easy!',
            function ($message) {
                $message->to('bambang.adrian@gmail.com');
            }
        );
        return 'hi';
    }
);
Route::get(
    'test/storage',
    function () {
        $uploadDir = realpath(base_path('storage/app/resources/views'));
        Storage::disk('local')->put('resources/views/test.blade.php', 'Contents');

        //Storage::move('resources/views/test.blade.php', 'resources/test.blade.php');
        return view('storageView::test');
    }
);