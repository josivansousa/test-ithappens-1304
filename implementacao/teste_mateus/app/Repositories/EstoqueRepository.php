<?php

namespace App\Repositories;

use App\Models\Estoque;
use App\Repositories\Contracts\EstoqueRepositoryInterface;

class EstoqueRepository implements EstoqueRepositoryInterface
{
	private $model;

	public function __construct(Estoque $model)
	{
		$this->model = $model;
	}

}
