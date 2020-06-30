@extends("index")

@section("conteudo")

<h1 class="h2">Produtos</h1>
<a href="{{url('/produtos/cadastrar')}}" class="btn btn-success"> 
    Novo produto 
</a>

<br><br>

<lista-produto></lista-produto>

@endsection