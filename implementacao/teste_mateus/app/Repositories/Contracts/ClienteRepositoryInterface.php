<?php

namespace App\Repositories\Contracts;

interface ClienteRepositoryInterface
{
    public function listar();

    public function encontrar($id);
    
    public function salvar($request);

    public function atualizar($request, $id);

    public function excluir($id);

}
