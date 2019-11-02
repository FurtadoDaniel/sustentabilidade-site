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
Route::resources([
    'abaixo-assinados'  =>  'AbaixoAssinadoController',
    'especies'          =>  'EspecieController',
    'eventos'           =>  'EventoController',
    'posts'             =>  'PostController',
    'produtos'          =>  'ProdutoController',
    'transacoes'        =>  'TransacaoController'
], [
    'parameters' => [
        'especies'      =>  'especie',
        'transacoes'    =>  'transacao'
    ]
]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/especies', 'EspecieController@index');
Route::get('/adotar/{id}', 'EspecieController@show');

Route::view('/sucesso', 'sucesso')->name('Sucesso');


Route::get('/', 'HomeController@index');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
