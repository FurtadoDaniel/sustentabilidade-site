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


Route::get('/adotar/{especie}', 'EspecieController@show')->name('adotar')->middleware('auth');
Route::view('/sucesso', 'sucesso')->name('Sucesso');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/eventos_pesquisar', 'EventoController@pesquisar')->name('pesquisar');
Route::view('/evento', 'Forms.evento')->name('novoEvento')->middleware('auth');
Route::view('/criar_abaixo', 'Forms.abaixo_assinado')->name('novoabaixo')->middleware('auth');
Route::post('/assinar', 'AssinaturasController@create')->middleware('auth');



Auth::routes();
