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
    Route::put('/salvar', "Api\ProdutoController@salvar");
    Route::get('/buscarProduto/{valor}', "Api\ProdutoController@buscarProduto");
    Route::delete('/excluir/{id}', "Api\ProdutoController@excluir");
});

Route::group(['prefix' => 'filiais'], function(){
    Route::get('/', "Api\FilialController@listar");
    Route::post('/salvar', "Api\FilialController@salvar");
    Route::put('/salvar', "Api\FilialController@salvar");
    Route::get('/buscarProduto/{valor}', "Api\FilialController@buscarProduto");
    Route::delete('/excluir/{id}', "Api\FilialController@excluir");
});
