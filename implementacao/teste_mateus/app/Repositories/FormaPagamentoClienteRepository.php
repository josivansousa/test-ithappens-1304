<?php

namespace App\Repositories;

use App\Models\FormaPagamento;
use App\Repositories\Contracts\FormaPagamentoRepositoryInterface;

class FormaPagamentoClienteRepository implements FormaPagamentoRepositoryInterface
{
	private $model;

	public function __construct(FormaPagamento $model)
	{
		$this->model = $model;
	}

}
