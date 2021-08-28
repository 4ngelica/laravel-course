@extends('app.layouts.basico')
@section('titulo', 'Produto')
@section('conteudo')
  <div class="conteudo-pagina">
    <div class="titulo-pagina-2">
      <p>Adicionar produto</p>
    </div>
    <div class="menu">
      <u>
        <li><a href="{{route('produto.index')}}">Voltar</a></li>
        <li><a href="">Consulta</a></li>
      </u>

    </div>
    <div class="informacao-pagina">
      {{-- {{$msg ?? ''}} --}}
      <div style="width:30%; margin-left:auto; margin-right:auto;">
        <form class="" action="" method="post">
          @csrf
          <input type="text" name="nome" placeholder="Nome" value="" class="borda-preta">
          {{-- {{ $errors->has('nome') ? $errors->first('nome') : ''}} --}}
          <input type="text" name="descricao" placeholder="Site" value="" class="borda-preta">
          {{-- {{$errors->has('site') ? $errors->first('site'): ''}} --}}
          <input type="text" name="peso" placeholder="UF" value="" class="borda-preta">
          {{-- {{$errors->has('uf') ? $errors->first('uf'): ''}} --}}
          <select class="borda-preta" name="unidade_id">
            <option value="">Selecione a unidade de medida</option>
            @foreach ($unidades as $unidade)
            <option value="{{$unidade->id}}">{{$unidade->descricao}}</option>
            @endforeach
          </select>
          {{-- {{$errors->has('email') ? $errors->first('email'): ''}} --}}
          <button type="submit" class="borda-preta">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>

@endsection
