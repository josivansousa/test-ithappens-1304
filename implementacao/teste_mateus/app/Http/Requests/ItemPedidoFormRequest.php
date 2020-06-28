<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ItemPedidoFormRequest extends FormRequest
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
            'pedido_estoque_id' => 'required|exists:pedidos_estoque,id',
            'valor_unitario'    => 'required|numeric',
            'produto_id'        => [
                'required',
                'exists:produtos,id',
                Rule::unique('itens_pedido', 'produto_id')->where(function ($query){ 
                    return $query->whereIn('status_item_id', [1,2])->get();
                })
            ]
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'pedido_estoque_id.required'   => 'Informe o pedido!',
            'pedido_estoque_id.exists'     => 'Pedido não encontrado!',
            'qtd.required'                 => 'Informe a quantidade!',
            'qtd.numeric'                  => 'Digite um valor maior que zero!',
            'valor_unitario.required'      => 'Digite o valor do produto!',
            'valor_unitario.numeric'       => 'Digite o valor!',
            'produto_id.required'          => 'Informe o pedido!',
            'produto_id.exists'            => 'Produto não encontrado!',
            'produto_id.unique'            => 'Produto já adicionado!',
        ];

        return $messages;
    }
}
