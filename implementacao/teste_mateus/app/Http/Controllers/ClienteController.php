<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function listar()
    {
        return view('clientes.listar');
    }

    public function cadastro()
    {
        return view('clientes.form');
    }

    public function atualizar($id)
    {
       return view('clientes.form_edit', compact('id'));
    }
}
