@if (isset($cliente->id))
<form class="" action="{{route('cliente.update', ['cliente' =>$cliente->id, 'fornecedores' =>$fornecedores])}}" method="post">
  @csrf
  @method('PUT')
@else
<form class="" action="{{route('cliente.store')}}" method="post">
  @csrf
@endif


  <input type="text" name="nome" placeholder="Nome" value="{{$cliente->nome ?? old('nome')}}" class="borda-preta">
  {{ $errors->has('nome') ? $errors->first('nome') : ''}}

  <button type="submit" class="borda-preta">Cadastrar</button>
</form>
