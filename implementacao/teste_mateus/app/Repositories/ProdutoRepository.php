<?php

namespace App\Repositories;

use App\Models\Produto;
use App\Repositories\Contracts\ProdutoRepositoryInterface;
use DB;

class ProdutoRepository implements ProdutoRepositoryInterface
{
	private $model;

	public function __construct(Produto $model)
	{
		$this->model = $model;
	}

	public function listar(){
		return $this->model->orderBy('descricao')->paginate(10);
	}

	public function recuperar($id){
		return $this->model->find($id);
	}
	
	public function salvar($request){

		$produto = DB::transaction(function () use ($request) {
			$id = (isset($request['id']) ? $request['id'] : null);

			return $this->model->updateOrCreate(['id' => $id], $request);
		});

		return $produto;
	}

	public function atualizar($request, $id){
		$produto = DB::transaction(function () use ($request, $id) {
			return $this->model
					->where('id', $id)
					->update($request);
		});

		return $produto;
	}

	public function buscarProduto($valor, $filial_id){
		return $this->model
				->where(function($query) use ($valor){
					return $query->where('codigo', $valor)
					->orWhere('descricao', 'like', '%'.$valor.'%');
				})->get();
	}

	public function excluir($id){
		$produto = $this->model->find($id);
		
		if(!$produto){
			throw new \Exception('Produto não encontrado!');
		}

		$produto->delete();
	}
}
