@extends("index")

@section("conteudo")

<h1 class="h2">Filiais</h1>
<a href="{{url('/filiais/cadastrar')}}" class="btn btn-success"> 
    Novo filiais 
</a>

<br><br>

<lista-filial></lista-filial>

@endsection