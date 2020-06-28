<?php

namespace App\Repositories;

use App\Models\Cliente;
use App\Repositories\Contracts\ClienteRepositoryInterface;

class ClienteRepository implements ClienteRepositoryInterface
{
	private $model;

	public function __construct(Cliente $model)
	{
		$this->model = $model;
	}

}
