<?php

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
