<?php

namespace App\Http\Controllers\Api;

use OpenApi\Annotations as OA;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Http\Requests\ProdutoFormRequest;

class ProdutoController extends Controller
{
    protected $produto;

    public function __construct(ProdutoRepositoryInterface $produto)
    {
        $this->produto = $produto;
    }
  
    public function listar()
    {
        try {
            $produtos = $this->produto->listar();

            return response()->json([
                'status' => 'sucesso', 'produtos' => $produtos
            ], 200);

        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
    
    public function recuperar($id)
    {
        try {
            $produto = $this->produto->recuperar($id);

            return response()->json([
                'status' => 'sucesso', 'produto' => $produto
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }    

    public function salvar(ProdutoFormRequest $request)
    {
        try{
            $produto = $this->produto->salvar($request->all());

            return response()->json([
                'status' => 'sucesso', 'produto' => $produto
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function atualizar(ProdutoFormRequest $request, $id)
    {
        try{
            $produto = $this->produto->atualizar($request->all(), $id);

            return response()->json([
                'status' => 'sucesso', 'mensagem' => 'Produto atualizado com sucesso!'
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function buscarProduto($valor, $filial_id)
    {
        try{
            $produtos = $this->produto->buscarProduto($valor, $filial_id);

            return ['status' => 'sucesso', 'produtos' => $produtos];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function excluir($id){
        try {
            $this->produto->excluir($id);

            return response()->json([
                'status' => 'sucesso', 'produto' => 'Produto excluído com sucesso!'
            ], 200);
        } catch (\Exception $e) {
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
}
