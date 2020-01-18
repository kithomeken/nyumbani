<?php

/*
|--------------------------------------------------------------------------
| External Route Files
|--------------------------------------------------------------------------
*/

require_once('mail_routes.php');


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

    Route::get('/tickets/create', 'TicketsController@createTicket')->name('ticket.create');

    // Route::get('/tickets/queue/id/{id}', [
    //     'uses'  => 'TicketsController@viewTicket',
    //     'as'    => 'view-ticket'
    // ]);    
});





Route::get('/pink', function () {
    Session::flash('success', 'This is a message!'); 
    return redirect('/home');
});
