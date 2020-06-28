<?php

namespace App\Repositories;

use App\Models\Filial;
use App\Repositories\Contracts\FilialRepositoryInterface;
use DB;

class FilialRepository implements FilialRepositoryInterface
{
	private $model;

	public function __construct(Filial $model)
	{
		$this->model = $model;
	}

	public function listar(){
		return $this->model->get();
	}

	public function encontrar($id){
		return $this->model->find($id);
	}
	
	public function salvar($request){

		$filial = DB::transaction(function () use ($request) {
			$id = (isset($request['id']) ? $request['id'] : null);

			return $this->model->updateOrCreate(['id' => $id], $request);
		});

		return $filial;
	}

	public function excluir($id){
		$filial = $this->model->find($id);
		
		if(!$filial){
			throw new \Exception('Produto não encontrado!');
		}

		$filial->delete();
	}
}
