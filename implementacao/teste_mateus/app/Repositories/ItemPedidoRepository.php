<?php

namespace App\Repositories;

use App\Models\ItemPedido;
use App\Repositories\Contracts\ItemPedidoRepositoryInterface;

class ItemPedidoRepository implements ItemPedidoRepositoryInterface
{
	private $model;

	public function __construct(ItemPedido $model)
	{
		$this->model = $model;
	}

}
