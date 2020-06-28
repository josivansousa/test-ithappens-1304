<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UsuarioRepositoryInterface;
use DB;

class UsuarioRepository implements UsuarioRepositoryInterface
{
	private $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

	public function listar(){
		return $this->model->get();
	}

	public function encontrar($id){
		$usuario = $this->model->find($id);
		if(!$usuario){
			throw new \Exception("Usuario não encontrado!");
		}
		return $usuario;

	}
	
	public function salvar($request){

		$usuario = DB::transaction(function () use ($request) {
			return $this->model->create($request);
		});

		return $usuario;
	}

	public function atualizar($request, $id){
		$usuario = DB::transaction(function () use ($request, $id) {
			return $this->model
					->where('id', $id)
					->update($request);
		});

		return $usuario;
	}

	public function excluir($id){
		$usuario = $this->model->find($id);
		
		if(!$usuario){
			throw new \Exception('Usuario não encontrado!');
		}

		$usuario->delete();
	}
}
