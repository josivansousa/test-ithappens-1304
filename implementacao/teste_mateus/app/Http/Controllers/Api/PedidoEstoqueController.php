<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PedidoFormRequest;
use App\Services\PedidoService;

class PedidoEstoqueController extends Controller
{
    protected $pedidoEstoque;

    public function __construct(PedidoService $pedidoEstoque)
    {
        $this->pedidoEstoque = $pedidoEstoque;
    }

    public function listar()
    {
        try {
            $pedidosEstoque = $this->pedidoEstoque->listar();

            return ['status' => 'sucesso', 'pedidosEstoque' => $pedidosEstoque];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
    
    public function recuperar($id)
    {
        try {
            $pedidoEstoque = $this->pedidoEstoque->encontrar($id);

            return ['status' => 'sucesso', 'pedidoEstoque' => $pedidoEstoque];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }    

    public function salvar(PedidoFormRequest $request)
    {
        try{
            $pedidoEstoque = $this->pedidoEstoque->salvar($request->all());

            return ['status' => 'sucesso', 'pedidoEstoque' => $pedidoEstoque];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function atualizar(PedidoFormRequest $request, $id)
    {
        try{
            $pedidoEstoque = $this->pedidoEstoque->atualizar($request->all(), $id);

            return ['status' => 'sucesso', 'mensagem' => 'Pedido atualizado com sucesso!'];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function confirmarPedido($id)
    {
        try {
            $pedidoEstoque = $this->pedidoEstoque->confirmarPedido($id);

            return ['status' => 'sucesso', 'mensagem' => 'Pedido processado!'];
        } catch (\Exception $e) {
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function excluir($id){
        try {
            $this->pedidoEstoque->excluir($id);

            return ['status' => 'sucesso', 'mensagem' => 'Pedido excluído com sucesso!'];
        } catch (\Exception $e) {
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
}
