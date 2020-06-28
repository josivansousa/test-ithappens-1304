<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstoqueFormRequest;
use App\Services\EstoqueService;

class EstoqueController extends Controller
{
    protected $estoque;

    public function __construct(EstoqueService $estoque)
    {
        $this->estoque = $estoque;
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
        try {
            $estoque = $this->estoque->encontrar($id);

            return $estoque;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function atualizarEstoque(EstoqueFormRequest $request)
    {
        try{
            $estoque = $this->estoque->atualizarEstoque($request->all());

            return ['status' => 'sucesso', 'mensagem' => "Estoque atualizado!"];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function atualizar(Request $request, $id)
    {
        try{
            $estoque = $this->estoque->atualizar($request->all(), $id);

            return "Filial atualizada com sucesso!";
        } catch(\Exception $e){
            return $e->getMessage();
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
