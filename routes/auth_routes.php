<?php
/*
|--------------------------------------------------------------------------
| Auth Route Files
|--------------------------------------------------------------------------
*/

Route::get('/account/activation/{id}/{hash}', [
    'as' => 'account.activation',
    'uses' => 'Auth\ActivationController@activate'
]);

Route::get('/account/create', [
    'as' => 'account.create',
    'uses' => 'Auth\ActivationController@create'
]);

Route::post('/account/create', [
    'as' => 'account.create',
    'uses' => 'Auth\ActivationController@createAccount'
]);

Route::post('/account/activate', [
    'as' => 'account.finalActivation',
    'uses' => 'Auth\ActivationController@finalActivation'
]);
