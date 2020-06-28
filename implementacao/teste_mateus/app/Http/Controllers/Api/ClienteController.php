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

            return $clientes;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }
    
    public function encontrar($id)
    {
        try {
            $cliente = $this->cliente->encontrar($id);

            return $cliente;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }
    
    public function salvar(Request $request)
    {
        try{
            $cliente = $this->cliente->salvar($request->all());

            return $cliente;
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function atualizar(Request $request, $id)
    {
        try{
            $cliente = $this->cliente->atualizar($request->all(), $id);

            return "Cliente atualizado com sucesso!";
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir($id){
        try {
            $this->cliente->excluir($id);

            return "Produto excluído com sucesso!";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }}
