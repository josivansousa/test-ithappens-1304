<?php

namespace App\Repositories;

use App\Models\Cliente;
use App\Repositories\Contracts\ClienteRepositoryInterface;
use DB;

class ClienteRepository implements ClienteRepositoryInterface
{
	private $model;

	public function __construct(Cliente $model)
	{
		$this->model = $model;
	}

	public function listar(){
		return $this->model->paginate(10);
	}

	public function recuperar($id){
		$cliente = $this->model->find($id);
		if(!$cliente){
			throw new \Exception("Cliente não encontrado!");
		}
		return $cliente;

	}
	
	public function salvar($request){

		$cliente = DB::transaction(function () use ($request) {
			return $this->model->create($request);
		});

		return $cliente;
	}

	public function atualizar($request, $id){
		$cliente = DB::transaction(function () use ($request, $id) {
			return $this->model
					->where('id', $id)
					->update($request);
		});

		return $cliente;
	}

	public function excluir($id){
		$cliente = $this->model->find($id);
		
		if(!$cliente){
			throw new \Exception('Cliente não encontrado!');
		}

		$cliente->delete();
	}
}
