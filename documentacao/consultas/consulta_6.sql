SELECT 
    (SUM(itens_pedido.valor_unitario) * SUM(itens_pedido.qtd)) AS valor_total
FROM
    test_mateus.pedidos_estoque
        INNER JOIN
    itens_pedido ON itens_pedido.pedido_estoque_id = pedidos_estoque.id
WHERE
    (SELECT 
            (SUM(itens_pedido.valor_unitario) * SUM(itens_pedido.qtd)) AS valor_total
        FROM
            test_mateus.itens_pedido
        WHERE
            itens_pedido.pedido_estoque_id = pedidos_estoque.id
        GROUP BY itens_pedido.pedido_estoque_id) > 500
GROUP BY pedidos_estoque.id