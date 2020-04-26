<?php
/*
|--------------------------------------------------------------------------
| Tickets Route Files
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'u/default/tickets', 'middleware' => 'auth'], function(){
    Route::get('/view/{id}', 'TicketsController@viewTicket')->name('ticket.view');
});