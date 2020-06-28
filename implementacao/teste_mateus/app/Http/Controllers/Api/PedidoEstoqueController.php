<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\PedidoEstoqueRepositoryInterface;

class PedidoEstoqueController extends Controller
{
    protected $pedidoEstoque;

    public function __construct(PedidoEstoqueRepositoryInterface $pedidoEstoque)
    {
        $this->pedidoEstoque = $pedidoEstoque;
    }

    public function listar()
    {
        try {
            $pedidosEstoque = $this->pedidoEstoque->listar();

            return $pedidosEstoque;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }
    
    public function recuperar($id)
    {
        try {
            $pedidoEstoque = $this->pedidoEstoque->encontrar($id);

            return $pedidoEstoque;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }    

    public function salvar(Request $request)
    {
        try{
            $pedidoEstoque = $this->pedidoEstoque->salvar($request->all());

            return $pedidoEstoque;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function atualizar(Request $request, $id)
    {
        try{
            $pedidoEstoque = $this->pedidoEstoque->atualizar($request->all(), $id);

            return "Pedido atualizado com sucesso!";
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    // public function buscarProduto($valor)
    // {
    //     try{
    //         $produtos = $this->produto->buscarProduto($valor);

    //         return $produtos;
    //     } catch(\Exception $e){
    //         return $e->getMessage();
    //     }
    // }

    public function excluir($id){
        try {
            $this->pedidoEstoque->excluir($id);

            return "Pedido excluído com sucesso!";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
