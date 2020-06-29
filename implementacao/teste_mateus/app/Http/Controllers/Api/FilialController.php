<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FilialRepositoryInterface;
use App\Http\Requests\FilialFormRequest;

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

            return response()->json([
                'status' => 'sucesso', 'filiais' => $filiais
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
    
    public function recuperar($id)
    {
        try {
            $filial = $this->filial->recuperar($id);

            return ['status' => 'sucesso', 'filial' => $filial];
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function salvar(FilialFormRequest $request)
    {
        try{
            $filial = $this->filial->salvar($request->all());

            return response()->json([
                'status' => 'sucesso', 'filial' => $filial
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function atualizar(FilialFormRequest $request, $id)
    {
        try{
            $cliente = $this->filial->atualizar($request->all(), $id);

            return response()->json([
                'status' => 'sucesso', 'mensagem' => 'Filial atualizada com sucesso'
            ], 200);
        } catch(\Exception $e){
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }

    public function excluir($id){
        try {
            $this->filial->excluir($id);

            return response()->json([
                'status' => 'sucesso', 'mensagem' => 'Filial excluído com sucesso'
            ], 200);
        } catch (\Exception $e) {
            return ['status' => 'erro', 'mensagem' => $e->getMessage()];
        }
    }
}
