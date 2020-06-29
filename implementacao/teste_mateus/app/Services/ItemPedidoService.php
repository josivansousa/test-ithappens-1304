<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ItemPedidoRepositoryInterface;
use App\Services\EstoqueService;

class ItemPedidoService
{
    protected $itemPedido;
    protected $estoqueService;

    public function __construct(ItemPedidoRepositoryInterface $itemPedido, EstoqueService $estoqueService)
    {
        $this->itemPedido = $itemPedido;
        $this->estoqueService = $estoqueService;
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

    public function setarStatusProcessado($id)
    {
        $this->itemPedido->setarStatusProcessado($id);

        return "Pedido setado como Processado!";
    }

    public function setarStatusCancelado($id)
    {
        $this->itemPedido->setarStatusCancelado($id);

        return "Pedido setado como Cancelado!";
    }

    public function retirada($id)
    {
        $itemPedido = $this->itemPedido->recuperar($id);

        if ($itemPedido->status_item_id != 2) {
            throw new \Exception("Item não pode ser retirado!");
        }

        $request = [
            'filial_id'     => $itemPedido->pedidosEstoque->filial_id,
            'qtd_total'     => $itemPedido->qtd,
            'valor_unitario'=> $itemPedido->valor_unitario,
            'produto_id'    => $itemPedido->produto_id,
            'status_pedido_id' => $itemPedido->pedidosEstoque->status_pedido_id 
        ];

        $atualizarPedido = $this->estoqueService->atualizarEstoque($request);

        $this->itemPedido->setarStatusCancelado($id);
    }

    public function excluir($id){
        $this->itemPedido->excluir($id);

        return "Item excluído com sucesso!";
    }
}
