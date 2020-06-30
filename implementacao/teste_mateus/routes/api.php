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

Route::post('/auth/login', 'Api\AuthController@login');
Route::get('/auth/usuario-autenticado', 'Api\AuthController@usuarioAutenticado');
Route::get('/auth/sair', 'Api\AuthController@sair');
Route::get('/auth/atualizar', 'Api\AuthController@atualizar');

// Route::middleware('jwt.auth')->group(function () {

// });

Route::group(['prefix' => 'produtos'], function(){
    Route::get('/', "Api\ProdutoController@listar");
    Route::get('/recuperar/{id}', "Api\ProdutoController@recuperar");
    Route::post('/salvar', "Api\ProdutoController@salvar");
    Route::put('/atualizar/{id}', "Api\ProdutoController@atualizar");
    Route::get('/buscar-produto/{valor}/{filial_id}', "Api\ProdutoController@buscarProduto");
    Route::delete('/excluir/{id}', "Api\ProdutoController@excluir");
});

Route::group(['prefix' => 'filiais'], function(){
    Route::get('/', "Api\FilialController@listar");
    Route::get('/listar-todos', "Api\FilialController@listarTodos");
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

Route::group(['prefix' => 'formas-pagamento'], function(){
    Route::get('/', "Api\FormaPagamentoController@listar");
    Route::get('/recuperar/{id}', "Api\FormaPagamentoController@recuperar");
    Route::post('/salvar', "Api\FormaPagamentoController@salvar");
    Route::put('/atualizar/{id}', "Api\FormaPagamentoController@atualizar");
    Route::delete('/excluir/{id}', "Api\FormaPagamentoController@excluir");
});

Route::group(['prefix' => 'pedidos-estoque'], function(){
    Route::get('/', "Api\PedidoEstoqueController@listar");
    Route::get('/recuperar/{id}', "Api\PedidoEstoqueController@recuperar");
    Route::post('/salvar', "Api\PedidoEstoqueController@salvar");
    Route::put('/atualizar/{id}', "Api\PedidoEstoqueController@atualizar");
    Route::delete('/excluir/{id}', "Api\PedidoEstoqueController@excluir");
    Route::put('/confirmar-pedido/{id}', "Api\PedidoEstoqueController@confirmarPedido");
});

Route::group(['prefix' => 'itens-pedido'], function(){
    Route::get('/', "Api\ItemPedidoController@listar");
    Route::get('/recuperar/{id}', "Api\ItemPedidoController@recuperar");
    Route::get('/recuperar-pedido/{id}', "Api\ItemPedidoController@recuperarPedido");
    Route::post('/salvar', "Api\ItemPedidoController@salvar");
    Route::put('/atualizar/{id}', "Api\ItemPedidoController@atualizar");
    Route::delete('/excluir/{id}', "Api\ItemPedidoController@excluir");
    Route::put('/retirada/{id}', "Api\ItemPedidoController@retirada");
});

Route::group(['prefix' => 'estoque'], function(){
    Route::get('/', "Api\EstoqueController@listar");
    Route::get('/recuperar/{filia_id}/{produto_id}', "Api\EstoqueController@recuperar");
    Route::post('/salvar', "Api\EstoqueController@atualizarEstoque");
});

Route::group(['prefix' => 'status-pedido'], function(){
    Route::get('/', "Api\StatusPedidoController@listar");
    Route::post('/salvar', "Api\EstoqueController@atualizarEstoque");
});