<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function listar()
    {
        return view('usuarios.listar');
    }

    public function cadastro()
    {
        return view('usuarios.form');
    }

    public function atualizar($id)
    {
       return view('usuarios.form_edit', compact('id'));
    }
}
