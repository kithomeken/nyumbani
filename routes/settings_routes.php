<?php
/*
|--------------------------------------------------------------------------
| Settings Route Files
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'u/default/settings', 'middleware' => ['auth', 'verified',]], function(){
    
    Route::get('/', 'settings\SettingsController@index')->name('settings.index');

    Route::get('/account', 'settings\SettingsController@account')->name('settings.account');

    Route::get('/tickets', 'settings\SettingsController@tickets')->name('settings.tickets');

        Route::post('/tickets/type/add', 'settings\SettingsController@addType')->name('settings.addType');

        Route::post('/tickets/region/add', 'settings\SettingsController@addRegion')->name('settings.addRegion');

        Route::get('/tickets/region/get', 'settings\SettingsController@getRegion')->name('settings.getRegion');

        Route::post('/tickets/statu/add', 'settings\SettingsController@addStatus')->name('settings.addStatus');

    Route::get('/user-management', 'settings\SettingsController@userManagement')->name('settings.users');
});
