@extends("index")

@section("conteudo")

<h1 class="h2">Pedidos</h1>

<a href="{{url('/pedidos-estoque/cadastrar')}}" class="btn btn-success"> 
    Novo pedido 
</a>

<lista-pedido></lista-pedido>

@endsection

