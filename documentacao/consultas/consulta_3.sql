SELECT 
    *
FROM
    test_mateus.pedidos_estoque
        INNER JOIN
    itens_pedido ON itens_pedido.pedido_estoque_id = pedidos_estoque.id
		INNER JOIN
    produtos ON produtos.id = itens_pedido.produto_id
    where produtos.codigo = '159898'