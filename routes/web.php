<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('contactos','ContactosController@index');
