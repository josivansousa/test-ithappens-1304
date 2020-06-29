<?php

namespace App\Repositories;

use App\Models\StatusPedido;
use App\Repositories\Contracts\StatusPedidoRepositoryInterface;

class StatusPedidoRepository implements StatusPedidoRepositoryInterface
{
	private $model;

	public function __construct(StatusPedido $model)
	{
		$this->model = $model;
	}

	public function listar(){
		return $this->model->get();
	}

}
