<?php

namespace App\Repositories;

use App\Models\PedidoEstoque;
use App\Repositories\Contracts\PedidoEstoqueRepositoryInterface;

class PedidoEstoqueRepository extends Repository implements PedidoEstoqueRepositoryInterface
{
	private $model;

	public function __construct(PedidoEstoque $model)
	{
		$this->model = $model;
	}

}
