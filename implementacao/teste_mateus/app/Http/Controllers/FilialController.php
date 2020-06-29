<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilialController extends Controller
{
    public function listar()
    {
        return view('filiais.listar');
    }

    public function cadastro()
    {
        return view('filiais.form');
    }

    public function atualizar($id)
    {
       return view('filiais.form_edit', compact('id'));
    }
}
