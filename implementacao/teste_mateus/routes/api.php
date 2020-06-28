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
    Route::get('/', "Api\ProdutoController@listar");
    Route::get('/recuperar/{id}', "Api\ProdutoController@recuperar");
    Route::post('/salvar', "Api\ProdutoController@salvar");
    Route::put('/atualizar/{id}', "Api\ProdutoController@atualizar");
    Route::get('/buscarProduto/{valor}', "Api\ProdutoController@buscarProduto");
    Route::delete('/excluir/{id}', "Api\ProdutoController@excluir");
});

Route::group(['prefix' => 'filiais'], function(){
    Route::get('/', "Api\FilialController@listar");
    Route::get('/recuperar/{id}', "Api\FilialController@recuperar");
    Route::post('/salvar', "Api\FilialController@salvar");
    Route::put('/atualizar/{id}', "Api\FilialController@atualizar");
    Route::delete('/excluir/{id}', "Api\FilialController@excluir");
});

Route::group(['prefix' => 'clientes'], function(){
    Route::get('/', "Api\ClienteController@listar");
    Route::get('/recuperar/{id}', "Api\ClienteController@recuperar");
    Route::post('/salvar', "Api\ClienteController@salvar");
    Route::put('/atualizar/{id}', "Api\ClienteController@atualizar");
    Route::delete('/excluir/{id}', "Api\ClienteController@excluir");
});

Route::group(['prefix' => 'usuarios'], function(){
    Route::get('/', "Api\UsuarioController@listar");
    Route::get('/recuperar/{id}', "Api\UsuarioController@recuperar");
    Route::post('/salvar', "Api\UsuarioController@salvar");
    Route::put('/atualizar/{id}', "Api\UsuarioController@atualizar");
    Route::delete('/excluir/{id}', "Api\UsuarioController@excluir");
});

Route::group(['prefix' => 'formas_pagamento'], function(){
    Route::get('/', "Api\FormaPagamentoController@listar");
    Route::get('/recuperar/{id}', "Api\FormaPagamentoController@recuperar");
    Route::post('/salvar', "Api\FormaPagamentoController@salvar");
    Route::put('/atualizar/{id}', "Api\FormaPagamentoController@atualizar");
    Route::delete('/excluir/{id}', "Api\FormaPagamentoController@excluir");
});

Route::group(['prefix' => 'pedidos_estoque'], function(){
    Route::get('/', "Api\PedidoEstoqueController@listar");
    Route::get('/recuperar/{id}', "Api\PedidoEstoqueController@recuperar");
    Route::post('/salvar', "Api\PedidoEstoqueController@salvar");
    Route::put('/atualizar/{id}', "Api\PedidoEstoqueController@atualizar");
    Route::delete('/excluir/{id}', "Api\PedidoEstoqueController@excluir");
});

Route::group(['prefix' => 'itens_pedido'], function(){
    Route::get('/', "Api\PedidoEstoqueController@listar");
    Route::get('/recuperar/{id}', "Api\PedidoEstoqueController@recuperar");
    Route::post('/salvar', "Api\PedidoEstoqueController@salvar");
    Route::put('/atualizar/{id}', "Api\PedidoEstoqueController@atualizar");
    Route::delete('/excluir/{id}', "Api\PedidoEstoqueController@excluir");
});