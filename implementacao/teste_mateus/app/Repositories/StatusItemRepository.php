<?php

namespace App\Repositories;

use App\Models\StatusItem;
use App\Repositories\Contracts\StatusItemRepositoryInterface;

class StatusItemRepository implements StatusItemRepositoryInterface
{
	private $model;

	public function __construct(StatusItem $model)
	{
		$this->model = $model;
	}

	public function listar(){
		return $this->model->get();
	}

}
