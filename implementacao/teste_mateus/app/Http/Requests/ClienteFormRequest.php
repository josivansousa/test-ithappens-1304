<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteFormRequest extends FormRequest
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
            'nome'      => 'required',
            'cpf'       => 'required|max:14',
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'nome.required'                 => 'Nome não informado!',
            'cpf.required'                 => 'CPF não informado!',
            'cpf.max'                       => 'Digite o CPF completo!',
        ];

        return $messages;
    }
}
