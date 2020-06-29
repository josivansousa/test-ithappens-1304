<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilialFormRequest extends FormRequest
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
            'cnpj'       => 'required|max:14',
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'nome.required'                 => 'Nome não informado!',
            'cnpj.required'                 => 'CNPJ não informado!',
            'cnpj.max'                      => 'Digite o CNPJ completo!',
        ];

        return $messages;
    }
}
