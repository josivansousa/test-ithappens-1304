<?php

namespace App\Repositories\Contracts;

interface ProdutoRepositoryInterface
{
    public function get();

    public function encontrar($id);
    
    public function salvar($request);

    public function atualizar($request, $id);

    public function buscarProduto($valor);

    public function excluir($id);
}
