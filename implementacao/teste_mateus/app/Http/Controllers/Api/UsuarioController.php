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

            return ['status' => 'sucesso', 'usuario' => $usuarios];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
    
    public function recuperar($id)
    {
        try {
            $usuario = $this->usuario->encontrar($id);

            return ['status' => 'sucesso', 'usuario' => $usuario];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
    
    public function salvar(Request $request)
    {
        try{
            $usuario = $this->usuario->salvar($request->all());

            return ['status' => 'sucesso', 'usuario' => $usuario];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function atualizar(Request $request, $id)
    {
        try{
            $usuario = $this->usuario->atualizar($request->all(), $id);

            return ['status' => 'sucesso', 'mensagem' => 'Usuario atualizado com sucesso!'];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function excluir($id){
        try {
            $this->usuario->excluir($id);

            return ['status' => 'sucesso', 'mensagem' => 'Usuario excluído com sucesso!'];
        } catch (\Exception $e) {
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
}
