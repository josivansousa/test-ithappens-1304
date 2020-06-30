<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UsuarioRepositoryInterface;
use App\Http\Requests\UsuarioFormRequest;

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

            return response()->json([
                'status' => 'sucesso', 'usuarios' => $usuarios
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
    
    public function recuperar($id)
    {
        try {
            $usuario = $this->usuario->recuperar($id);

            return ['status' => 'sucesso', 'usuario' => $usuario];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
    
    public function salvar(UsuarioFormRequest $request)
    {
        try{
            $usuario = $this->usuario->salvar($request->all());

            return response()->json([
                'status' => 'sucesso', 'usuario' => $usuario
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function atualizar(Request $request, $id)
    {
        try{
            $usuario = $this->usuario->atualizar($request->all(), $id);

            return response()->json([
                'status' => 'sucesso', 'mensagem' => 'Usuario atualizado com sucesso!'
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function excluir($id){
        try {
            $this->usuario->excluir($id);

            return response()->json([
                'status' => 'sucesso', 'mensagem' => 'Usuario excluído com sucesso!'
            ], 200);
        } catch (\Exception $e) {
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
}
