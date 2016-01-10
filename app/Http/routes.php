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
    ['prefix' => 'admin', 'namespace' => 'Admin'],
    function () {
        Route::group(
            ['middleware' => ['auth', 'acl']],
            function () {
                $resourceOption = [];
                Route::get('mail/campaign-sent/{id}', 'CampaignController@getSent');
                Route::post('mail/campaign-sent/{id}', 'CampaignController@doSent');
                Route::resource('master/user', 'UserController', $resourceOption);
                Route::resource('master/profile', 'ProfileController', $resourceOption);
                Route::resource('master/import', 'ImportFromController', $resourceOption);
                Route::resource('master/template', 'TemplateController', $resourceOption);
                Route::resource('master/trackstatus', 'TrackingStatusController', $resourceOption);
                Route::resource('master/segment', 'SegmentController', $resourceOption);
                Route::resource('master/segmentCriteria', 'SegmentCriteriaController', $resourceOption);
                Route::resource('master/campaignCategory', 'CampaignCategoryController', $resourceOption);
                Route::resource('master/campaignType', 'CampaignTypeController', $resourceOption);
                Route::resource('master/campaignTopic', 'CampaignTopicController', $resourceOption);
                Route::resource('master/randomIndex', 'RandomIndexController', $resourceOption);
                Route::resource('mail/campaign', 'CampaignController', $resourceOption);
                Route::resource('mail/subscriber', 'SubscriberController', $resourceOption);
                Route::resource('mail/maillist', 'MailListController', $resourceOption);
                Route::resource('mail/maillist/{listID}/groups', 'SubscriberGroupController', $resourceOption);
                Route::resource('mail/maillist/{listID}/group/{groupID}/detail', 'SubscriberGroupDetailController', $resourceOption);
                Route::resource('mail/schedule', 'CampaignScheduleController', $resourceOption);
                Route::resource('mail/tracking', 'MailTrackingController', $resourceOption);
                Route::resource('mail/sentMail', 'SentMailController', $resourceOption);
                Route::resource('mail/trackingReport', 'TrackingReportController', $resourceOption);
                Route::group(['namespace' => 'Dss'], function() use ($resourceOption){
                    Route::resource('dss/period', 'DssPeriodController', $resourceOption);
                    Route::resource('dss/criteria', 'DssCriteriaController');
                    Route::resource('dss/alternative', 'DssAlternativeController', $resourceOption);
                    Route::resource('dss/consistency', 'DssConsistencyController', $resourceOption);
                    Route::resource('dss/priority', 'DssPriorityController', $resourceOption);
                    Route::resource('dss/result', 'DssResultController', $resourceOption);
                });
                Route::resource('company', 'CompanyController', $resourceOption);
                Route::get('dashboard', 'DashboardController@index');
            }
        );
        Route::group(['namespace' => 'Auth'], function(){
            Route::get('login', 'AuthController@getLogin');
            Route::post('login', 'AuthController@doAuth');
            Route::get('logout', 'AuthController@doLogout');
            Route::get('resetpwd', 'PasswordController@getResetPassword');
            Route::post('resetpwd', 'PasswordController@doResetPassword');
        });
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