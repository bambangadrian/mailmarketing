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
                Route::group(
                    ['prefix' => 'master', 'namespace' => 'Master'],
                    function () {
                        $resourceOption = [];
                        Route::resource('user', 'UserController', $resourceOption);
                        Route::resource('profile', 'ProfileController', $resourceOption);
                        Route::resource('import', 'ImportFromController', $resourceOption);
                        Route::resource('template', 'TemplateController', $resourceOption);
                        Route::resource('trackstatus', 'TrackingStatusController', $resourceOption);
                        Route::resource('segment', 'SegmentController', $resourceOption);
                        Route::resource('segmentCriteria', 'SegmentCriteriaController', $resourceOption);
                        Route::resource('campaignCategory', 'CampaignCategoryController', $resourceOption);
                        Route::resource('campaignType', 'CampaignTypeController', $resourceOption);
                        Route::resource('campaignTopic', 'CampaignTopicController', $resourceOption);
                        Route::resource('company', 'CompanyController', $resourceOption);
                    }
                );
                Route::group(
                    ['prefix' => 'mail', 'namespace' => 'Mail'],
                    function () {
                        $resourceOption = [];
                        Route::resource('campaign', 'CampaignController', $resourceOption);
                        Route::resource('campaign.sent', 'SentCampaignController', ['only' => ['index', 'store']]);
                        Route::resource('subscriber', 'SubscriberController', $resourceOption);
                        Route::resource('maillist', 'MailListController', $resourceOption);
                        Route::resource('maillist.groups', 'SubscriberGroupController', $resourceOption);
                        Route::resource('maillist.group.detail', 'SubscriberGroupDetailController', $resourceOption);
                        Route::resource('schedule', 'MailScheduleController', $resourceOption);
                        Route::resource('tracking', 'MailTrackingController', $resourceOption);
                        Route::resource('sentMail', 'SentMailController', $resourceOption);
                        Route::resource('trackingReport', 'TrackingReportController', $resourceOption);
                    }
                );
                Route::group(
                    ['prefix' => 'dss', 'namespace' => 'Dss'],
                    function () {
                        $resourceOption = [];
                        Route::resource('period', 'DssPeriodController', $resourceOption);
                        Route::resource('criteria', 'DssCriteriaController');
                        Route::resource('alternative', 'DssAlternativeController', $resourceOption);
                        Route::resource('consistency', 'DssConsistencyController', $resourceOption);
                        Route::resource('priority', 'DssPriorityController', $resourceOption);
                        Route::resource('priority.result', 'DssResultController', ['only' => ['index']]);
                        Route::resource('randomIndex', 'DssRandomIndexController', $resourceOption);
                    }
                );
                Route::get('dashboard', 'DashboardController@index');
                Route::get('/', 'DashboardController@index');
            }
        );
        Route::group(
            ['namespace' => 'Auth'],
            function () {
                Route::get('login', 'AuthController@getLogin');
                Route::post('login', 'AuthController@doAuth');
                Route::get('logout', 'AuthController@doLogout');
                Route::get('resetpwd', 'PasswordController@getResetPassword');
                Route::post('resetpwd', 'PasswordController@doResetPassword');
            }
        );
    }
);
# To Handle Ajax Request.
Route::controller('ajax', 'AjaxController');
# To handle all web hooks.
Route::group(
    ['prefix' => 'webhooks', 'namespace' => 'WebHooks'],
    function () {
        Route::group(
            ['prefix' => 'mailgun', 'namespace' => 'Mailgun'],
            function () {
                Route::controller('tracking', 'TrackingHooks');
            }
        );
    }
);
# Testing Purpose.
Route::resource('register', 'RegistrationController');
Route::get(
    'test/mail',
    function () {
        //$result = \Mailgun::send(['welcome'], [], function ($message) {
        //    $message->to('faber.banjarnahor@gmail.com', 'Faber Banjarnahor');
        //    $message->bcc('bambang.adrian@gmail.com', 'Bambang Adrian S');
        //    $message->subject('Welcome!');
        //});

        $result = \Mailgun::lists()->all();
        dd($result);
        return 'hi';
    }
);
Route::get(
    'test/storage',
    function () {
        $uploadDir = realpath(base_path('storage/app/resources/views'));
        Storage::disk('local')->put('resources /views/test.blade.php', 'Contents');

        //Storage::move('resources / views / test.blade.php', 'resources / test.blade.php');
        return view('storageView::template2.index');
    }
);