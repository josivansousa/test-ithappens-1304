<?php

namespace App\Repositories\Contracts;

interface UsuarioRepositoryInterface
{
    public function listar();

    public function recuperar($id);
    
    public function salvar($request);

    public function atualizar($request, $id);

    public function excluir($id);
}
