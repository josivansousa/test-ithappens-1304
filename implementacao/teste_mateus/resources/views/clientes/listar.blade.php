@extends("index")

@section("conteudo")

<h1 class="h2">Clientes</h1>
<a href="{{url('/clientes/cadastrar')}}" class="btn btn-success"> 
    Novo cliente
</a>

<br><br>

<lista-cliente></lista-cliente>

@endsection