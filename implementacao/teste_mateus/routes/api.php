<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'produtos'], function(){
    Route::get('/', "Api\ProdutoController@index");
    Route::get('/encontrar/{id}', "Api\ProdutoController@encontrar");
    Route::post('/salvar', "Api\ProdutoController@salvar");
    Route::put('/atualizar/{id}', "Api\ProdutoController@atualizar");
    Route::get('/buscarProduto/{valor}', "Api\ProdutoController@buscarProduto");
    Route::delete('/excluir/{id}', "Api\ProdutoController@excluir");
});

Route::group(['prefix' => 'filiais'], function(){
    Route::get('/', "Api\FilialController@listar");
    Route::get('/encontrar/{id}', "Api\FilialController@encontrar");
    Route::post('/salvar', "Api\FilialController@salvar");
    Route::put('/atualizar/{id}', "Api\FilialController@atualizar");
    Route::delete('/excluir/{id}', "Api\FilialController@excluir");
});

Route::group(['prefix' => 'clientes'], function(){
    Route::get('/', "Api\ClienteController@listar");
    Route::get('/encontrar/{id}', "Api\ClienteController@encontrar");
    Route::post('/salvar', "Api\ClienteController@salvar");
    Route::put('/atualizar/{id}', "Api\ClienteController@atualizar");
    Route::delete('/excluir/{id}', "Api\ClienteController@excluir");
});

Route::group(['prefix' => 'usuarios'], function(){
    Route::get('/', "Api\UsuarioController@listar");
    Route::get('/encontrar/{id}', "Api\UsuarioController@encontrar");
    Route::post('/salvar', "Api\UsuarioController@salvar");
    Route::put('/atualizar/{id}', "Api\UsuarioController@atualizar");
    Route::delete('/excluir/{id}', "Api\UsuarioController@excluir");
});