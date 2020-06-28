<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ClienteRepositoryInterface;

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

            return ['status' => 'sucesso', 'clientes' => $clientes];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
    
    public function recuperar($id)
    {
        try {
            $cliente = $this->cliente->encontrar($id);

            return ['status' => 'sucesso', 'cliente' => $cliente];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
    
    public function salvar(Request $request)
    {
        try{
            $cliente = $this->cliente->salvar($request->all());

            return ['status' => 'sucesso', 'cliente' => $cliente];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function atualizar(Request $request, $id)
    {
        try{
            $cliente = $this->cliente->atualizar($request->all(), $id);

            return ['status' => 'sucesso', 'mensagem' => 'Cliente atualizado com sucesso!'];
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
