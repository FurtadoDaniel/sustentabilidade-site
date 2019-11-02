<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/especies/{tipo}', [
    'uses'  =>  'EspecieController@index',
    'as'    =>  'especies.index'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/especies', 'EspecieController@index');
Route::get('/adotar/{id}', 'EspecieController@show');

Route::post('/eventos_pesquisar', 'EventoController@pesquisar')->name('pesquisar');

Route::view('/sucesso', 'sucesso')->name('Sucesso');


Route::get('/', 'HomeController@index');

Route::get('/adotar/{especie}', 'EspecieController@show')->name('adotar')->middleware('auth');

Route::view('/sucesso', 'sucesso')->name('Sucesso');

Auth::routes();
