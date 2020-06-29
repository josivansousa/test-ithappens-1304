<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ItemPedidoRepositoryInterface;
use App\Repositories\Contracts\PedidoEstoqueRepositoryInterface;
use App\Services\EstoqueService;

class ItemPedidoService
{
    protected $itemPedido;
    protected $estoqueService;
    protected $pedidoEstoqueRepository;
    
    public function __construct(ItemPedidoRepositoryInterface $itemPedido, EstoqueService $estoqueService, PedidoEstoqueRepositoryInterface $pedidoEstoqueRepository)
    {
        $this->itemPedido = $itemPedido;
        $this->estoqueService = $estoqueService;
        $this->pedidoEstoqueRepository = $pedidoEstoqueRepository;
    }

    public function listar()
    {
        $itensPedido = $this->itemPedido->listar();

        return $itensPedido;
    }
    
    public function recuperar($id)
    {
        $itemPedido = $this->itemPedido->recuperar($id);

        return $itemPedido;
    }    

    public function recuperarPedido($pedidoEstoqueId)
    {
        $itesPedido = $this->itemPedido->recuperarPedido($pedidoEstoqueId);

        return $itesPedido;
    }    

    public function salvar($request)
    {
        $pedido = $this->pedidoEstoqueRepository
                ->recuperar($request['pedido_estoque_id']);
        ///////////////////////////
        $estoque =  $this->estoqueService->recuperar($pedido->filial_id, $request['produto_id']);

        if($pedido->status_pedido_id == 2){
            // dd(9, !$estoque || ($estoque->qtd_total < $request['qtd']));
            if(!$estoque || ($estoque->qtd_total < $request['qtd'])){
                throw new \Exception("Produto não disponível!", 422);
            }
            return $this->itemPedido->salvar($request);
        }

        return $this->itemPedido->salvar($request);
    }

    public function atualizar($request, $id)
    {
        $itemPedido = $this->itemPedido->atualizar($request, $id);

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

        if (!$itemPedido || $itemPedido->status_item_id != 2) {
            throw new \Exception("Item não encontrado ou não pode ser retirado!");
        }

        $request = [
            'filial_id'     => $itemPedido->pedidosEstoque->filial_id,
            'qtd_total'           => $itemPedido->qtd,
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
