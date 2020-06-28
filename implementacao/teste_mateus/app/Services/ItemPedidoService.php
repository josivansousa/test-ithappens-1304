<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ItemPedidoRepositoryInterface;

class ItemPedidoService
{
    protected $itemPedido;

    public function __construct(ItemPedidoRepositoryInterface $itemPedido)
    {
        $this->itemPedido = $itemPedido;
    }

    public function listar()
    {
        $itensPedido = $this->itemPedido->listar();

        return $itensPedido;
    }
    
    public function recuperar($id)
    {
        $itemPedido = $this->itemPedido->encontrar($id);

        return $itemPedido;
    }    

    public function salvar(ItemPedidoFormRequest $request)
    {
        $itemPedido = $this->itemPedido->salvar($request->all());

        return $itemPedido;
    }

    public function atualizar(Request $request, $id)
    {
        $itemPedido = $this->itemPedido->atualizar($request->all(), $id);

        return "Item atualizado com sucesso!";
    }

    public function excluir($id){
        $this->itemPedido->excluir($id);

        return "Item excluído com sucesso!";
    }
}
