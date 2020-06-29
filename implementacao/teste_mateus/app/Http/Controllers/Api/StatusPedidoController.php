<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\StatusPedidoRepositoryInterface;

class StatusPedidoController extends Controller
{
    protected $status;

    public function __construct(StatusPedidoRepositoryInterface $status)
    {
        $this->status = $status;
    }

	public function listar(){
        try {
            $status = $this->status->listar();

            return response()->json([
                'status' => 'sucesso', 
                'dataStatus' => $status
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }

	}
}
