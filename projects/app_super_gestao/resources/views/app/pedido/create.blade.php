@extends('app.layouts.basico')
@section('titulo', 'Pedido')
@section('conteudo')
  <div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar pedido</p>
    </div>
    <div class="menu">
      <u>
        <li><a href="{{route('pedido.index')}}">Voltar</a></li>
        <li><a href="">Consulta</a></li>
      </u>

    </div>
    <div class="informacao-pagina">
      <div style="width:30%; margin-left:auto; margin-right:auto;">
        @component('app.pedido._components.form_create_edit', ['pedidos' => $pedidos, 'clientes' => $clientes])
        @endcomponent
      </div>
    </div>
  </div>

@endsection
