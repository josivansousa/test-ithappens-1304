<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EstoqueFormRequest extends FormRequest
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
            'qtd_total'      => 'required',
            'item_pedido_id' => 'required|exists:itens_pedido,id',
            'filial_id'      => 'required|exists:filiais,id',
            'valor_unitario' => 'required|numeric',
            'produto_id'     => 'required|exists:produtos,id',
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'item_pedido_id.required'      => 'Item não informado!',
            'item_pedido_id.exists'        => 'Item não encontrado!',
            'filial_id.required'           => 'Filial não informado!',
            'filial_id.exists'             => 'Filial não encontrado!',
            'valor_unitario.required'      => 'Valor não informado!',
            'valor_unitario.numeric'       => 'Valor inválido!',
            'valor_unitario.min'           => 'Digite um valor maior que zero!',
            'produto_id.required'          => 'Produto não informado!',
            'produto_id.exists'            => 'Produto não encontrado!',
            'qtd_total.required'           => 'Quantidade não informado!',
        ];

        return $messages;
    }
}
