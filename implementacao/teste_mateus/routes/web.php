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
    return view('clientes.listar');
});

Route::group(['prefix' => 'clientes'], function(){
    Route::get('/', 'ClienteController@listar');
    Route::get('/cadastrar', 'ClienteController@cadastro');
    Route::get('/atualizar/{id}', 'ClienteController@atualizar');    
});

Route::group(['prefix' => 'filiais'], function(){
    Route::get('/', 'FilialController@listar');
    Route::get('/cadastrar', 'FilialController@cadastro');
    Route::get('/atualizar/{id}', 'FilialController@atualizar');    
});

Route::group(['prefix' => 'formas-pagamento'], function(){
    Route::get('/', 'FormaPagamentoController@listar');
    Route::get('/cadastrar', 'FormaPagamentoController@cadastro');
    Route::get('/atualizar/{id}', 'FormaPagamentoController@atualizar');    
});

Route::group(['prefix' => 'usuarios'], function(){
    Route::get('/', 'FormaPagamentoController@listar');
    Route::get('/cadastrar', 'FormaPagamentoController@cadastro');
    Route::get('/atualizar/{id}', 'FormaPagamentoController@atualizar');    
});