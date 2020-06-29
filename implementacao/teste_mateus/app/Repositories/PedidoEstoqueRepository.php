<?php

namespace App\Repositories;

use App\Models\PedidoEstoque;
use App\Repositories\Contracts\PedidoEstoqueRepositoryInterface;
use DB;

class PedidoEstoqueRepository implements PedidoEstoqueRepositoryInterface
{
	private $model;

	public function __construct(PedidoEstoque $model)
	{
		$this->model = $model;
	}

	public function listar(){
		return $this->model
			->with('itensPedido.produtos.estoque', 'cliente', 'usuario', 'filial','status', 'formaPagamento')
			->paginate(10);
	}

	public function recuperar($id){
		return $this->model->with('itensPedido.produtos.estoque')->find($id);
	}
	
	public function salvar($request){

		$pedidoEstoque = DB::transaction(function () use ($request) {
			// $id = (isset($request['id']) ? $request['id'] : null);

			return $this->model->create($request);
		});

		return $pedidoEstoque;
	}

	public function atualizar($request, $id){
		
		$pedidoEstoque = DB::transaction(function () use ($request, $id) {
			$pedidoEstoque = $this->model->find($id);
			if(!$pedidoEstoque){
				throw new \Exception("Pedido não encontrado!");
			}
			return $pedidoEstoque->update($request);
		});
		return $pedidoEstoque;
	}

	// public function buscarProduto($valor){
	// 	return $this->model->where('codigo', $valor)->orWhere('descricao', 'like', "%".$valor."%")->get();
	// }

	public function excluir($id){
		$pedidoEstoque = $this->model->find($id);
		
		if(!$pedidoEstoque){
			throw new \Exception('Produto não encontrado!');
		}

		$pedidoEstoque->delete();
	}
}
