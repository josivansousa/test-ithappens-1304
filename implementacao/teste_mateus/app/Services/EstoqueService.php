<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\EstoqueRepositoryInterface;
use App\Repositories\Contracts\ItemPedidoRepositoryInterface;

class EstoqueService
{
    protected $estoque;
    protected $itemPedido;

    public function __construct(EstoqueRepositoryInterface $estoque, ItemPedidoRepositoryInterface $itemPedido)
    {
        $this->estoque = $estoque;
        $this->itemPedido = $itemPedido;
    }

    public function listar()
    {
        try {
            $estoques = $this->estoque->listar();

            return $estoques;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }
    
    public function recuperar($id)
    {
        $estoque = $this->estoque->encontrar($id);

        return $estoque;
    }

    public function atualizarEstoque($request)
    {
        $estoque = $this->estoque->recuperar($request['filial_id'], $request['produto_id']);

        if($estoque){
            if ($request['status_pedido_id'] == 1) {
                $estoque = $this->estoque->incrementar($request, $estoque);
            }else{
                if($estoque->qtd_total < $request['qtd_total']){
                    throw new \Exception("Quantidade superior a quantidade em estoque");
                }
                $estoque = $this->estoque->decremetar($request, $estoque);
            }
        }else {
            $estoque = $this->estoque->salvar($request);
        }
    }

    public function excluir($id){
        try {
            $this->estoque->excluir($id);

            return "Estoque excluído com sucesso!";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
