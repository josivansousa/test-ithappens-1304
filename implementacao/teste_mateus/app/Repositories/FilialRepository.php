<?php

namespace App\Repositories;

use App\Models\Filial;
use App\Repositories\Contracts\FilialRepositoryInterface;

class FilialRepository implements FilialRepositoryInterface
{
	private $model;

	public function __construct(Filial $model)
	{
		$this->model = $model;
	}
}
