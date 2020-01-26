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

        Route::post('/tickets/type/edit', 'settings\SettingsController@editType')->name('settings.editType');

        Route::post('/tickets/region/add', 'settings\SettingsController@addRegion')->name('settings.addRegion');

        Route::get('/tickets/region/get', 'settings\SettingsController@getRegion')->name('settings.getRegion');

        Route::post('/tickets/region/edit', 'settings\SettingsController@editRegion')->name('settings.editRegion');

        Route::post('/tickets/status/add', 'settings\SettingsController@addStatus')->name('settings.addStatus');

        Route::post('/tickets/status/edit', 'settings\SettingsController@editStatus')->name('settings.editStatus');

        Route::post('/tickets/escalation/add', 'settings\SettingsController@addToEscalation')->name('settings.addToEscalation');

        Route::post('/tickets/escalation/edit', 'settings\SettingsController@editEscalation')->name('settings.editEscalation');

        Route::get('/tickets/escalation/types/add', 'settings\SettingsController@addToEscalationType')->name('settings.addToEscalationType');

        Route::get('/tickets/escalation/types/remove', 'settings\SettingsController@removeFromEscalationType')->name('settings.removeFromEscalationType');

        Route::get('/tickets/escalation/teams/get', 'settings\SettingsController@getEscalationTeam')->name('settings.getEscalationTeam');

    Route::get('/user-management', 'settings\SettingsController@userManagement')->name('settings.users');
});
