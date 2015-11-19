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
            ['middleware' => ['acl']],
            function () {
                Route::get('test', 'TestController@index');

                Route::resource('user', 'UserController');
                Route::resource('subscriber', 'SubscriberController');
                Route::resource('criteria', 'SegmentCriteriaController');
                Route::resource('segment', 'SegmentController');
                Route::resource('template', 'TemplateController');
                Route::resource('maillist', 'MailListController');
                Route::resource('trackstatus', 'TrackingStatusController');
                Route::resource('group', 'SubscriberGroupController');
                Route::resource('company', 'SubscriberGroupController', ['only' => ['index', 'update']]);

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