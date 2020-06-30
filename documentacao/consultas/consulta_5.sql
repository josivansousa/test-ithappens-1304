SELECT 
    (SUM(itens_pedido.valor_unitario) * SUM(itens_pedido.qtd))
FROM
    test_mateus.pedidos_estoque
        INNER JOIN
    itens_pedido ON itens_pedido.pedido_estoque_id = pedidos_estoque.id
group by pedidos_estoque.id