<?php
/*
|--------------------------------------------------------------------------
| Datatables Route Files
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'u/default/tickets', 'middleware' => 'auth'], function(){
    Route::get('/datatables/table/overdue', 'datatables\DatatablesController@overdueTable')->name('datatables.overdueTable');


});

