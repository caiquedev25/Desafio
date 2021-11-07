<?php

use Illuminate\Http\Request;

Route::get('users', 'ApiController@getAllUser');//retorno
Route::get('users/{id}', 'ApiController@getUser');//retorna alumo especifico

Route::post('users','ApiController@createUser');//create

Route::put('users/{id}', 'ApiController@updateUser');

Route::delete('users/{id}','ApiController@deleteUser');
