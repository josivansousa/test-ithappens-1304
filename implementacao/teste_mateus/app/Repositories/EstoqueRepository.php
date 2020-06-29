<?php

namespace App\Repositories;

use App\Models\Estoque;
use App\Repositories\Contracts\EstoqueRepositoryInterface;
use DB;

class EstoqueRepository implements EstoqueRepositoryInterface
{
	private $model;

	public function __construct(Estoque $model)
	{
		$this->model = $model;
	}

	public function listar(){
		return $this->model->get();
	}

	public function recuperar($filial_id, $produto_id){
		$estoque = $this->model->where([
			'filial_id'  => $filial_id,
			'produto_id' => $produto_id
		])->first();

		return $estoque;
	}
	
	public function salvar($request){
		$estoque = DB::transaction(function () use ($request) {
			return $this->model->create($request);
		});

		return $estoque;
	}

	public function incrementar($request, $estoque)
	{
		$estoque = DB::transaction(function () use ($request, $estoque) {
			$estoque->qtd_total += $request['qtd_total'];

			return $estoque->save();
		});

		return $estoque;
	}

	public function decremetar($request, $estoque)
	{
		$estoque = DB::transaction(function () use ($request, $estoque) {
			$estoque->qtd_total -= $request['qtd_total'];

			return $estoque->save();
		});

		return $estoque;
	}

	public function atualizar($request, $id){
		$estoque = DB::transaction(function () use ($request, $id) {
			return $this->model
					->where('id', $id)
					->update($request);
		});

		return $estoque;
	}

	public function excluir($id){
		$estoque = $this->model->find($id);
		
		if(!$estoque){
			throw new \Exception('Produto não encontrado!');
		}

		$estoque->delete();
	}
}
