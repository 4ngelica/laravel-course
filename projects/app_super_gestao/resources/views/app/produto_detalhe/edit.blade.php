@extends('app.layouts.basico')
@section('titulo', 'Detalhes do Produto')
@section('conteudo')
  <div class="conteudo-pagina">
    <div class="titulo-pagina-2">
      <p>Editar detalhes do produto</p>
    </div>
    <div class="menu">
      <u>
        <li><a href="">Voltar</a></li>
      </u>

    </div>
    <div class="informacao-pagina">
      <h4>Produto</h4>
      <div class="">Nome: {{$produto_detalhe->produto->nome}}</div><br>
      <div class="">Descrição: {{ $produto_detalhe->produto->descricao}}</div><br>
      <div style="width:30%; margin-left:auto; margin-right:auto;">
        @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe'=>$produto_detalhe, 'unidades'=>$unidades])
        @endcomponent
      </div>
    </div>
  </div>
@endsection
