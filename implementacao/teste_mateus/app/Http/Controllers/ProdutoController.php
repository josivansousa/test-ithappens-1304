<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function listar()
    {
        return view('produtos.listar');
    }

    public function cadastro()
    {
        return view('produtos.form');
    }

    public function atualizar($id)
    {
       return view('produtos.form_edit', compact('id'));
    }
}
