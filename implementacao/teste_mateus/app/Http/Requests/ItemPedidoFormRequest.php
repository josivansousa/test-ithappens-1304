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

        // if ($this->status_item_id == 1) {
        //     $qtd = $this['qtd'];
        //     $produto_id = $this['produto_id'];
        //     $qtd_total = (\DB::table('pedidos_estoque') 
        //                     ->select('estoques.qtd_total')
        //                     ->join('estoques', 'estoques.filial_id', '=', 'pedidos_estoque.filial_id')
        //                     ->where([
        //                         'pedidos_estoque.id' => $this['pedido_estoque_id'],
        //                         'estoques.produto_id' => $this['produto_id']
        //                     ])->first())->qtd_total;
        //     ////////////////////////
        //     $rules += [ 
        //             'qtd' => [
        //                 'required',
        //                 'numeric',
        //                 'min:1',
        //                 'max:'.$qtd_total
        //             ]
        //     ];
        // }else{
        //     $rules += [
        //         'qtd'   => 'required|numeric|min:1'
        //     ];
        // }
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'pedido_estoque_id.required'   => 'Informe o pedido!',
            'pedido_estoque_id.exists'     => 'Pedido não encontrado!',
            'qtd.required'                 => 'Informe a quantidade!',
            'qtd.numeric'                  => 'Digite um valor maior que zero!',
            // 'qtd.max'                      => 'Produto sem estoque!',
            'valor_unitario.required'      => 'Digite o valor do produto!',
            'valor_unitario.numeric'       => 'Digite o valor!',
            'produto_id.required'          => 'Informe o pedido!',
            'produto_id.exists'            => 'Produto não encontrado!',
            'produto_id.unique'            => 'Produto já adicionado!',
        ];

        return $messages;
    }
}
