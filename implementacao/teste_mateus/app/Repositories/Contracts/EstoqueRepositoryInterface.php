<?php

namespace App\Repositories\Contracts;

interface EstoqueRepositoryInterface
{
    public function listar();

    public function recuperar($filial_id, $produto_id);
    
    public function salvar($request);

    public function atualizar($request, $id);

    public function excluir($id);
}
