<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'member', 'middleware' => 'auth'], function() {
    Route::get('ques/create', 'Member\QuesController@add');
    Route::post('ques/create', 'Member\QuesController@create');
    Route::get('ques', 'Member\QuesController@index');
    Route::get('ques/edit', 'Member\QuesController@edit');
    Route::post('ques/update', 'Member\QuesController@update');
    Route::get('ques/delete', 'Member\QuesController@delete');
});

Auth::routes();

Route::group(['prefix' => 'cpa','middleware' => 'guest:cpa'], function() {
    Route::get('/', function () {
        return view('cpa.welcome');
    });
    Route::get('login', 'Cpa\Auth\LoginController@showLoginForm')->name('cpa.login');
    
    Route::get('login', 'Cpa\Auth\LoginController@showLoginForm')->name('cpa.login');
    Route::post('login', 'Cpa\Auth\LoginController@login')->name('cpa.login');
    
    Route::get('register', 'Cpa\Auth\RegisterController@showRegisterForm')->name('cpa.register');
    Route::post('register', 'Cpa\Auth\RegisterController@register')->name('cpa.register');
    
    Route::get('password/rest', 'Cpa\Auth\ForgotPasswordController@showLinkRequestForm')->name('cpa.password.request');
});

Route::group(['prefix' => 'cpa', 'middleware' => 'auth:cpa'], function(){
    Route::post('logout', 'Cpa\Auth\LoginController@logout')->name('cpa.logout');
    Route::get('home', 'Cpa\HomeController@index')->name('cpa.home');
});

Route::group(['prefix' => 'cpa', 'middleware' => 'auth:cpa'], function() {
     Route::get('answer/create', 'Cpa\AnswerController@add');
     Route::post('answer/create', 'Cpa\AnswerController@create');
     Route::get('answer', 'Cpa\AnswerController@index');
});