<?php

namespace App\Repositories\Contracts;

interface FilialRepositoryInterface
{
    public function listar();

    public function recuperar($id);
    
    public function salvar($request);

    public function atualizar($request, $id);

    public function excluir($id);
}
