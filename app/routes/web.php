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

/*
    Aqui eu defino a rota, primeiro parâmetro é a URL e o segundo é o controller e depois do @
    e a função que quero executar.

    Route::get('/imoveis','PropertyController@index');
    Nesse exemplo vou acessar consegui acessar a ULR  meusite.com.br/imoveis/index

    Route::get('/imoveis','PropertyController@novo');
    Nesse exemplo vou acessar consegui acessar a ULR  meusite.com.br/imoveis/novo


*/

Route::get('/imoveis','PropertyController@index');

// Precisamos de duas rotas para fazer um cadastro
Route::get('/imoveis/cadastrarImovel', 'PropertyController@cadastrarImovel');
Route::post('/imoveis/fazerCadastroImovel', 'PropertyController@fazerCadastroImovel');

Route::get('/imoveis/visualizar/{nameslugimovel}','PropertyController@visualizarImovel');

//Editar o imóvel
Route::get('/imoveis/editar/{nameslugimovel}','PropertyController@editar');
Route::put('/imoveis/update/{nameslugimovel}','PropertyController@update');

// Excluindo o imóvel
Route::get('/imoveis/remover/{nameslugimovel}','PropertyController@destroy');

