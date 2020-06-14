<?php

/*
|--------------------------------------------------------------------------
| External Route Files
|--------------------------------------------------------------------------
*/

require_once('auth_routes.php');
require_once('mail_routes.php');
require_once('settings_routes.php');
require_once('tickets_routes.php');
require_once('datatable_routes.php');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/home');
});

Auth::routes(['verify' => true]);

Route::get('/home', function(){
    return redirect('/u/default/dashboard');
});

Route::group(['prefix' => 'u/default', 'middleware' => 'auth'], function(){

    Route::get('/dashboard', 'HomeController@index')->name('home');
});





Route::get('/pink', function () {
    Session::flash('success', 'This is a message!'); 
    return redirect('/home');
});
