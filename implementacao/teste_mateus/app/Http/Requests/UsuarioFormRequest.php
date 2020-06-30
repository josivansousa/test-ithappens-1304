<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioFormRequest extends FormRequest
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
            'email'         => 'required',
            'filial_id'         => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'nome.required'           => 'Nome não informado!',
            'email.required'              => 'Email não informado!',
            'filial_id.required'              => 'Filial não informado!',
        ];

        return $messages;
    }
}
