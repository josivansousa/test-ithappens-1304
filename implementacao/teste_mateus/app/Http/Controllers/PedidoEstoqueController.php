<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidoEstoqueController extends Controller
{
    public function listar()
    {
        return view('pedido_estoque.listar');
    }

    public function cadastro()
    {
        return view('pedido_estoque.form');
    }

    public function atualizar($id)
    {
       return view('pedido_estoque.form_edit', compact('id'));
    }
}
