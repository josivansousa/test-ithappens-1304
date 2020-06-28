<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ItemPedidoRepositoryInterface;
use App\Http\Requests\ItemPedidoFormRequest;

class ItemPedidoController extends Controller
{
    protected $itemPedido;

    public function __construct(ItemPedidoRepositoryInterface $itemPedido)
    {
        $this->itemPedido = $itemPedido;
    }

    public function listar()
    {
        try {
            $itensPedido = $this->itemPedido->listar();

            return $itensPedido;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }
    
    public function recuperar($id)
    {
        try {
            $itemPedido = $this->itemPedido->encontrar($id);

            return $itemPedido;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }    

    public function salvar(ItemPedidoFormRequest $request)
    {
        dd($request->all());
        try{
            $itemPedido = $this->itemPedido->salvar($request->all());

            return $itemPedido;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function atualizar(Request $request, $id)
    {
        try{
            $itemPedido = $this->itemPedido->atualizar($request->all(), $id);

            return "Item atualizado com sucesso!";
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir($id){
        try {
            $this->itemPedido->excluir($id);

            return "Item excluído com sucesso!";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
