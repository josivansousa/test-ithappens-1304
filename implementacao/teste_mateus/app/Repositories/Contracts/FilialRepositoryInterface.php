<?php

namespace App\Repositories\Contracts;

interface FilialRepositoryInterface
{
    public function listar();

    public function encontrar($id);
    
    public function salvar($request);

    public function excluir($id);
}
