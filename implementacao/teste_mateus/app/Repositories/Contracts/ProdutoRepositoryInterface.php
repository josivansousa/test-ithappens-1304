<?php

namespace App\Repositories\Contracts;

interface ProdutoRepositoryInterface
{
    public function listar();

    public function recuperar($id);
    
    public function salvar($request);

    public function atualizar($request, $id);

    public function buscarProduto($valor, $filial_id);

    public function excluir($id);
}
