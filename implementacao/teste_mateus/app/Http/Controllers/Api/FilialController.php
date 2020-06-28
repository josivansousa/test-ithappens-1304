<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FilialRepositoryInterface;

class FilialController extends Controller
{
    protected $filial;

    public function __construct(FilialRepositoryInterface $filial)
    {
        $this->filial = $filial;
    }

    public function listar()
    {
        try {
            $filiais = $this->filial->listar();

            return ['status' => 'sucesso', 'filiais' => $filiais];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
    
    public function recuperar($id)
    {
        try {
            $filial = $this->filial->encontrar($id);

            return ['status' => 'sucesso', 'filial' => $filial];
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function salvar(Request $request)
    {
        try{
            $filial = $this->filial->salvar($request->all());

            return ['status' => 'sucesso', 'filial' => $filial];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function atualizar(Request $request, $id)
    {
        try{
            $cliente = $this->filial->atualizar($request->all(), $id);

            return ['status' => 'sucesso', 'mensagem' => 'Filial atualizada com sucesso'];
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function excluir($id){
        try {
            $this->filial->excluir($id);

            return ['status' => 'sucesso', 'mensagem' => 'Filial excluído com sucesso'];
        } catch (\Exception $e) {
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
}
