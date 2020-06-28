<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProdutoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSalvarProduto()
    {
        $dados = [
            'id'        => '',
            'descricao' => 'Produto Um',
            'codigo'    => '58454',
        ];

        $response = $this->json('post', '/api/salvar', $dados);

        $this->assertTrue(200);
    }
}
