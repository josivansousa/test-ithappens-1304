<?php

namespace App\Repositories;

use App\Models\FormaPagamento;
use App\Repositories\Contracts\FormaPagamentoRepositoryInterface;
use DB;

class FormaPagamentoRepository implements FormaPagamentoRepositoryInterface
{
	private $model;

	public function __construct(FormaPagamento $model)
	{
		$this->model = $model;
	}

	public function listar(){
		return $this->model->get();
	}

	public function recuperar($id){
		$formaPagamento = $this->model->find($id);
		if(!$formaPagamento){
			throw new \Exception("Cliente não encontrado!");
		}
		return $formaPagamento;
	}
	
	public function salvar($request){

		$formaPagamento = DB::transaction(function () use ($request) {
			return $this->model->create($request);
		});

		return $formaPagamento;
	}

	public function atualizar($request, $id){
		$formaPagamento = DB::transaction(function () use ($request, $id) {
			return $this->model
					->where('id', $id)
					->update($request);
		});

		return $formaPagamento;
	}

	public function excluir($id){
		$formaPagamento = $this->model->find($id);
		
		if(!$formaPagamento){
			throw new \Exception('Forma de pagamento não encontrado!');
		}

		$formaPagamento->delete();
	}
}
