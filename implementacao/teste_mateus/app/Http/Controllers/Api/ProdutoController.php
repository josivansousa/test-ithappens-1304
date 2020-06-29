<?php

namespace App\Http\Controllers\Api;

use OpenApi\Annotations as OA;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ProdutoRepositoryInterface;

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
            $produto = $this->produto->encontrar($id);

            return response()->json([
                'status' => 'sucesso', 'produto' => $produto
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }    

    public function salvar(Request $request)
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

    public function atualizar(Request $request, $id)
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

    public function buscarProduto($valor)
    {
        try{
            $produtos = $this->produto->buscarProduto($valor);

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
