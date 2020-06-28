<?php

namespace App\Repositories\Contracts;

interface PedidoEstoqueRepositoryInterface
{
    public function listar();

    public function recuperar($id);
    
    public function salvar($request);

    public function atualizar($request, $id);

    // public function buscarProduto($valor);

    public function excluir($id);
}
