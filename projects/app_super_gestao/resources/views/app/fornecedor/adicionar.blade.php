@extends('app.layouts.basico')
@section('titulo', 'Fornecedor')
@section('conteudo')
  <div class="conteudo-pagina">
    <div class="titulo-pagina-2">
      <p>Fornecedor - Adicionar</p>
    </div>
    <div class="menu">
      <u>
        <li><a href="{{route("app.fornecedor.adicionar")}}">Novo</a></li>
        <li><a href="{{route("app.fornecedor")}}">Consulta</a></li>
      </u>

    </div>
    <div class="informacao-pagina">
      {{$msg}}
      <div style="width:30%; margin-left:auto; margin-right:auto;">
        <form class="" action="{{route('app.fornecedor.adicionar')}}" method="post">
          @csrf
          <input type="text" name="nome" placeholder="Nome" value="{{old('nome')}}" class="borda-preta">
          {{ $errors->has('nome') ? $errors->first('nome') : ''}}
          <input type="text" name="site" placeholder="Site" value="{{old('site')}}" class="borda-preta">
          {{$errors->has('site') ? $errors->first('site'): ''}}
          <input type="text" name="uf" placeholder="UF" value="{{old('uf')}}" class="borda-preta">
          {{$errors->has('uf') ? $errors->first('uf'): ''}}
          <input type="text" name="email" placeholder="Email" value="{{old('email')}}" class="borda-preta">
          {{$errors->has('email') ? $errors->first('email'): ''}}
          <button type="submit" class="borda-preta">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>

@endsection
