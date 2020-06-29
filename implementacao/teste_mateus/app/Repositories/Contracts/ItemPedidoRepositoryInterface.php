<?php

namespace App\Repositories\Contracts;

interface ItemPedidoRepositoryInterface
{
    public function listar();

    public function recuperar($id);

    public function recuperarPedido($pedidoEstoqueId);

    public function salvar($request);

    public function atualizar($request, $id);

    public function setarStatusProcessado($id);
    
    public function setarStatusCancelado($id);
    
    public function excluir($id);
}
