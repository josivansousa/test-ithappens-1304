<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FormaPagamentoRepositoryInterface;

class FormaPagamentoController extends Controller
{
    protected $formaPagamento;

    public function __construct(FormaPagamentoRepositoryInterface $formaPagamento)
    {
        $this->formaPagamento = $formaPagamento;
    }

    public function listar()
    {
        try {
            $formasPagamentos = $this->formaPagamento->listar();

            return response()->json([
                'status' => 'sucesso', 'formasPagamentos' => $formasPagamentos
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
    
    public function recuperar($id)
    {
        try {
            $formaPagamento = $this->formaPagamento->recuperar($id);

            return ['status' => 'sucesso', 'formaPagamento' => $formaPagamento];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
    
    public function salvar(Request $request)
    {
        try{
            $formaPagamento = $this->formaPagamento->salvar($request->all());

            return response()->json([
                'status' => 'sucesso', 'formaPagamento' => $formaPagamento
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function atualizar(Request $request, $id)
    {
        try{
            $formaPagamento = $this->formaPagamento->atualizar($request->all(), $id);

            return response()->json([
                'status' => 'sucesso', 'mensagem' => 'Forma de pagamento atualizado com sucesso!'
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function excluir($id){
        try {
            $this->formaPagamento->excluir($id);

            return response()->json([
                'status' => 'sucesso', 'mensagem' => 'Forma de pagamento excluído com sucesso!'
            ], 200);
        } catch (\Exception $e) {
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
}
