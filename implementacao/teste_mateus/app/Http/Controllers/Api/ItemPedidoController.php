<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ItemPedidoService;
use App\Http\Requests\ItemPedidoFormRequest;

class ItemPedidoController extends Controller
{
    protected $itemPedido;

    public function __construct(ItemPedidoService $itemPedido)
    {
        $this->itemPedido = $itemPedido;
    }

    public function listar()
    {
        try {
            $itensPedido = $this->itemPedido->listar();

            return ['status' => 'sucesso', 'itensPedido' => $itensPedido];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
    
    public function recuperar($id)
    {
        try {
            $itemPedido = $this->itemPedido->encontrar($id);

            return ['status' => 'sucesso', 'itemPedido' => $itemPedido];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }    

    public function salvar(ItemPedidoFormRequest $request)
    {
        try{
            $itemPedido = $this->itemPedido->salvar($request->all());

            return response()->json([
                'status' => 'sucesso', 'itemPedido' => $itemPedido
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function atualizar(Request $request, $id)
    {
        try{
            $itemPedido = $this->itemPedido->atualizar($request->all(), $id);

            return ['status' => 'sucesso', 'mensagem' => 'Item atualizado com sucesso!'];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function retirada($id)
    {
        try{
            $itemPedido = $this->itemPedido->retirada($id);

            return ['status' => 'sucesso', 'mensagem' => 'Item atualizado com sucesso!'];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function excluir($id){
        try {
            $this->itemPedido->excluir($id);

            return ['status' => 'sucesso', 'mensagem' => 'Item excluído com sucesso!'];
        } catch (\Exception $e) {
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
}
