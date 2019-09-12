<?php



Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('categorias', 'CategoriasController@index')->name('categorias.index'); //ruta para listar categorias
Route::post('categorias', 'CategoriasController@store')->name('categorias.store'); //ruta para guardar la categoria

Route::resource('posts', 'PostsController');

Route::resource('blogs', 'BlogController');
