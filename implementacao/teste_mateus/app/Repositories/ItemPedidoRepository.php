<?php

namespace App\Repositories;

use App\Models\ItemPedido;
use App\Repositories\Contracts\ItemPedidoRepositoryInterface;
use DB;

class ItemPedidoRepository implements ItemPedidoRepositoryInterface
{
	private $model;

	public function __construct(ItemPedido $model)
	{
		$this->model = $model;
	}

	public function listar(){
		return $this->model->get();
	}

	public function recuperar($id){
		return $this->model->with('pedidosEstoque')->find($id);
	}
	
	public function salvar($request){
		$request += ['status_item_id' => 1];

		$itemPedido = DB::transaction(function () use ($request) {
			return $this->model->create($request);
		});

		return $itemPedido;
	}

	public function atualizar($request, $id){
		
		$itemPedido = DB::transaction(function () use ($request, $id) {
			$itemPedido = $this->model->find($id);
			if(!$itemPedido){
				throw new \Exception("Item não encontrado!");
			}
			return $itemPedido->update($request);
		});
		return $itemPedido;
	}

    public function setarStatusProcessado($id){
		$itemPedido = DB::transaction(function () use ($id) {
			$itemPedido = $this->model->find($id);
			if(!$itemPedido){
				throw new \Exception("Item não encontrado!");
			}
			return $itemPedido->update(['status_item_id' => 2]);
		});
		return $itemPedido;
	}

	public function setarStatusCancelado($id){
		$itemPedido = DB::transaction(function () use ($id) {
			$itemPedido = $this->model->find($id);
			if(!$itemPedido){
				throw new \Exception("Item não encontrado!");
			}
			return $itemPedido->update(['status_item_id' => 3]);
		});
		
		return $itemPedido;
	}

	public function excluir($id){
		$pedidoEstoque = $this->model->find($id);
		
		if(!$pedidoEstoque){
			throw new \Exception('Produto não encontrado!');
		}

		$pedidoEstoque->delete();
	}
}
