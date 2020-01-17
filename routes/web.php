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

require_once('mail_routes.php');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('sendattachmentemail','HomeController@attachment_email');

Route::get('/mail', function () {
    return view('mail');
});

Route::get('/pink', function () {

    Session::flash('success', 'This is a message!'); 
    return redirect('/home');
});


// Route::get('/sign-up/individual', [
//     'as' => 'register.individual',
//     'uses' => 'Auth\SignUpController@individual'
// ]);