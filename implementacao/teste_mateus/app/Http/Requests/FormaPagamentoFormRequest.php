<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormaPagamentoFormRequest extends FormRequest
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
            'forma_pagamento'      => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'forma_pagamento.required'           => 'Nome não informado!',
        ];

        return $messages;
    }
}
