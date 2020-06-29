<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormaPagamentoController extends Controller
{
    public function listar()
    {
        return view('formas_pagamento.listar');
    }

    public function cadastro()
    {
        return view('formas_pagamento.form');
    }

    public function atualizar($id)
    {
        // dd($id);
       return view('formas_pagamento.form_edit', compact('id'));
    }
}
