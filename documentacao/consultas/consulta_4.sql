SELECT 
    *
FROM
    test_mateus.pedidos_estoque
inner join formas_pagamento on formas_pagamento.id = pedidos_estoque.forma_pagamento_id