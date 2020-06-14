<?php
/*
|--------------------------------------------------------------------------
| Datatables Route Files
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'u/default', 'middleware' => 'auth'], function(){
    Route::get('/datatables/table/overdue', 'datatables\DatatablesController@overdueTable')->name('datatables.overdueTable');

    Route::get('/datatables/table/today', 'datatables\DatatablesController@todayTable')->name('datatables.todayTable');

    Route::get('/datatables/table/scheduled', 'datatables\DatatablesController@scheduledTable')->name('datatables.scheduledTable');
});

