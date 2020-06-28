<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UsuarioRepositoryInterface;

class UsuarioController extends Controller
{
    protected $usuario;

    public function __construct(UsuarioRepositoryInterface $usuario)
    {
        $this->usuario = $usuario;
    }

    public function listar()
    {
        try {
            $usuarios = $this->usuario->listar();

            return $usuarios;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }
    
    public function encontrar($id)
    {
        try {
            $usuario = $this->usuario->encontrar($id);

            return $usuario;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }
    
    public function salvar(Request $request)
    {
        try{
            $usuario = $this->usuario->salvar($request->all());

            return $usuario;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function atualizar(Request $request, $id)
    {
        try{
            $usuario = $this->usuario->atualizar($request->all(), $id);

            return "Usuario atualizado com sucesso!";
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir($id){
        try {
            $this->usuario->excluir($id);

            return "Usuario excluído com sucesso!";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
