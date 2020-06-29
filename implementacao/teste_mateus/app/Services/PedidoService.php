<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\PedidoEstoqueRepositoryInterface;
use App\Services\EstoqueService;

class PedidoService
{
    protected $pedidoEstoque;
    protected $itemPedidoService;
    protected $estoqueService;

    public function __construct(PedidoEstoqueRepositoryInterface $pedidoEstoque, ItemPedidoService $itemPedidoService, EstoqueService $estoqueService)
    {
        $this->pedidoEstoque = $pedidoEstoque;
        $this->itemPedidoService = $itemPedidoService;
        $this->estoqueService = $estoqueService;

    }

    public function listar()
    {
        $pedidoEstoques = $this->pedidoEstoque->listar();

        return $pedidoEstoques;
    }
    
    public function recuperar($id)
    {
        $pedidoEstoque = $this->pedidoEstoque->recuperar($id);

        return $pedidoEstoque;
    }    

    public function salvar($request)
    {
        $pedidoEstoque = $this->pedidoEstoque->salvar($request);

        return $pedidoEstoque;
    }

    public function atualizar($request, $id)
    {
        $pedidoEstoque = $this->pedidoEstoque->atualizar($request, $id);

        return "Item atualizado com sucesso!";
    }

    public function setarStatusProcessado($id)
    {
        $this->pedidoEstoque->setarStatusProcessado($id);

        return "Pedido setado como Processado!";
    }

    public function setarStatusCancelado($id)
    {
        $this->pedidoEstoque->setarStatusCancelado($id);

        return "Pedido setado como Cancelado!";
    }

    public function excluir($id){
        $this->pedidoEstoque->excluir($id);

        return "Item excluído com sucesso!";
    }

    public function confirmarPedido($id)
    {
        $pedidoEstoque = $this->pedidoEstoque->recuperar($id);
        if (!$pedidoEstoque && count($pedidoEstoque->itensPedido) == 0) {
            throw new \Exception("Não há nenhum pedido selecionado!");
        }

        foreach ($pedidoEstoque->itensPedido as $key => $itemPedido) {
            if($itemPedido->status_item_id != 3){
                $request = [
                    'filial_id'     => $pedidoEstoque->filial_id,
                    'produto_id'    => $itemPedido->produto_id,
                    'valor_unitario'=> $itemPedido->valor_unitario,
                    'qtd_total'     => $itemPedido->qtd,
                    'status_pedido_id' => $pedidoEstoque->status_pedido_id,
                    'status_item_id' => $itemPedido->status_item_id 
                ];
                
                
                $this->estoqueService->atualizarEstoque($request);
    
                $this->itemPedidoService->setarStatusCancelado($itemPedido->id);
            }

            $request = [];
        }
    }
}
