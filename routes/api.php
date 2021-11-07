<?php

use Illuminate\Http\Request;


Route::get('students', 'ApiController@getAllUser');//retorno
Route::get('students/{id}', 'ApiController@getUser');//retorna alumo especifico

Route::post('students','ApiController@createUser');//create

Route::put('students/{id}', 'ApiController@updateUser');

Route::delete('students/{id}','ApiController@deleteUser');
