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

/**
 * As operações podem ser:
 * - 'attach', adiciona uma midia ao referido model
 * - 'detach', remove uma midia ou um array de midias do model,
 * - 'sync', remove todas as midias que nao estao no array e adicona as que estao.
 * 
 * Mais informações, me pergunte ou veja a documentação:
 * https://laravel-mediable.readthedocs.io/en/latest/mediable.html#handling-media
 * 
 * @author Joao Gabriel C. Melo <joaomelo.contato@outlook.com>
 */
Route::match(
    ['post', 'patch'],
    '/{model}/{id}/midias/{operacao}',
    ['uses' => 'ManipularMidias', 'as' => 'midia']
);

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
Route::view('/criar_produto', 'Forms.produto')->name('novo_produto')->middleware('auth');
Route::get('/carrinho', 'CarrinhoController@index')->middleware('auth');
Route::post('/carrinho', 'CarrinhoController@store')->name('add_car')->middleware('auth');
Route::delete('/carrinho', 'CarrinhoController@limpar')->middleware('auth');

Auth::routes();
