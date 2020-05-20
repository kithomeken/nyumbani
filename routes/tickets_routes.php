<?php
/*
|--------------------------------------------------------------------------
| Tickets Route Files
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'u/default/tickets', 'middleware' => 'auth'], function(){
    Route::get('/create', 'tickets\TicketsController@createTicketView')->name('ticket.createTicketView');

    Route::post('/create/post', 'tickets\TicketsController@createTicket')->name('ticket.createTicket');

    Route::get('/view/{id}', 'tickets\TicketsController@viewTicket')->name('ticket.viewTicket');

    Route::post('/view/comments/add', 'tickets\TicketsController@addComment')->name('ticket.addComment');

    Route::post('/view/comments/delete', 'tickets\TicketsController@deleteComment')->name('ticket.deleteComment');
});