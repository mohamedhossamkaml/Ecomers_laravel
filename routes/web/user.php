<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'user' , 'namespace'=> 'User'], function () {

    Config::set('auth.default', 'user');

    Route::get( 'login', 'AuthUsers@index');
    Route::post( 'login', 'AuthUsers@login');
    Route::get( 'init/user', 'AuthUsers@init');

    Route::post('/category' ,'UserData@getCat' );

    Route::get('{path}','HomeController@index')->where( 'path','([A-z\d-\/_.]+)?' );

    Route::group(['middleware' => 'users:user'], function () {
        Route::any('logout/gend', 'AuthUsers@logout');
        Route::resource( 'home', 'HomeController');
        Route::get( '/', 'AuthUsers@index');
    });


    Route::get('lang/{lang}',function($lang)
    {
        // if short hand
        session()->has('lang')? session()->forget('lang'):'';

        // if short hand
        $lang == 'ar'? session()->put('lang','ar') : session()->put('lang','en');

        return back();
    });

});

























    // Route::get('/', function () {
    //     return view('style.index');
    // });
    // Route::post('login/gaerd', 'AuthUsers@login_post');
    // Route::get('forgot/password', 'AuthUsers@forgot_password');
    // Route::post('forgot/password', 'AuthUsers@forgot_password_post');
    // Route::get('reset/password/{token}', 'AuthUsers@reset_password');
    // Route::post('reset/password/{token}', 'AuthUsers@reset_password_post');
    // Route::get( 'init/user', 'AuthUsers@init');
