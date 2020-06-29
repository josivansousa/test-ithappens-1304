<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\StatusPedidoRepositoryInterface;

class StatusItemController extends Controller
{
    protected $status;

    public function __construct(StatusPedidoRepositoryInterface $produto)
    {
        $this->status = $status;
    }

	public function listar(){
		return $this->status->listar();
	}
}
