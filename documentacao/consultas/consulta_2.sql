SELECT 
    produtos.descricao, produtos.codigo, estoques.qtd_total
FROM
	test_mateus.produtos
        INNER JOIN
    estoques ON estoques.produto_id = produtos.id
where estoques.filial_id = 60