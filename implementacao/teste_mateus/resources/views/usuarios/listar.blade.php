@extends("index")

@section("conteudo")

<h1 class="h2">Usuarios</h1>

<a href="{{url('/usuarios/cadastrar')}}" class="btn btn-success"> 
    Novo usuario 
</a>

<br><br>

<lista-usuario></lista-usuario>

@endsection