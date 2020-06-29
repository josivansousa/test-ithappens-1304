<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ClienteRepositoryInterface;
use App\Http\Requests\ClienteFormRequest;

class ClienteController extends Controller
{
    protected $cliente;

    public function __construct(ClienteRepositoryInterface $cliente)
    {
        $this->cliente = $cliente;
    }

    public function listar()
    {
        try {
            $clientes = $this->cliente->listar();

            return response()->json([
                'status' => 'sucesso', 'clientes' => $clientes
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
            
        }
    }
    
    public function recuperar($id)
    {
        try {
            $cliente = $this->cliente->recuperar($id);

            return ['status' => 'sucesso', 'cliente' => $cliente];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
    
    public function salvar(ClienteFormRequest $request)
    {
        try{
            $cliente = $this->cliente->salvar($request->all());

            return response()->json([
                'status' => 'sucesso', 'cliente' => $cliente
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function atualizar(ClienteFormRequest $request, $id)
    {
        try{
            $cliente = $this->cliente->atualizar($request->all(), $id);

            return response()->json([
                'status' => 'sucesso', 'mensagem' => 'Cliente atualizado com sucesso!'
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function excluir($id){
        try {
            $this->cliente->excluir($id);

            return ['status' => 'sucesso', 'mensagem' => 'Cliente excluído com sucesso!'];
        } catch (\Exception $e) {
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
}
