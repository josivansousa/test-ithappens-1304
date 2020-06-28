<?php

namespace App\Http\Controllers\Api;

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

            return $produtos;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }
    
    public function recuperar($id)
    {
        try {
            $produto = $this->produto->encontrar($id);

            return $produto;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }    

    public function salvar(Request $request)
    {
        try{
            $produto = $this->produto->salvar($request->all());

            return $produto;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function atualizar(Request $request, $id)
    {
        try{
            $produto = $this->produto->atualizar($request->all(), $id);

            return "Produto atualizado com sucesso!";
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function buscarProduto($valor)
    {
        try{
            $produtos = $this->produto->buscarProduto($valor);

            return $produtos;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir($id){
        try {
            $this->produto->excluir($id);

            return "Produto excluído com sucesso!";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
