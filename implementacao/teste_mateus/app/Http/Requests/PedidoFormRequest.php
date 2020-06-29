<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PedidoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'user_id'               => 'required|exists:usuarios,id',
            'filial_id'             => 'required|exists:filiais,id',
            'cliente_id'            => 'required|exists:clientes,id',
            'forma_pagamento_id'    => 'required|exists:formas_pagamento,id',
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'user_id.required'             => 'Usuário não informado!',
            'user_id.exists'               => 'Usuário não encontrado!',
            'filial_id.required'           => 'Filial não informado!',
            'filial_id.exists'             => 'Filial não encontrado!',
            'cliente_id.required'          => 'Cliente não informado!',
            'cliente_id.exists'            => 'Cliente não encontrado!',
            'forma_pagamento_id.required'  => 'Forma de pagamento não informado!',
            'forma_pagamento_id.exists'    => 'Forma de pagamento não encontrado!',
        ];

        return $messages;
    }
}
