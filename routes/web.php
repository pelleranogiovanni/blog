<?php


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('categorias','CategoriasController@index')->name('categorias.index');
Route::post('categorias','CategoriasController@store')->name('categorias.store');

Route::resource('posts', 'PostsController');
