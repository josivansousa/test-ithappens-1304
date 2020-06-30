@extends("index")

@section("conteudo")

<h1 class="h2">Formas de pagamento</h1>
<a href="{{url('/formas-pagamento/cadastrar')}}" class="btn btn-success"> 
    Novo forma de pagamento 
</a>

<br><br>

<lista-forma-pagamento></lista-forma-pagamento>

@endsection