@if (isset($pedido->id))
<form class="" action="{{route('pedido.update', ['pedido' =>$pedido->id, 'clientes' =>$clientes])}}" method="post">
  @csrf
  @method('PUT')
@else
<form class="" action="{{route('pedido.store')}}" method="post">
  @csrf
@endif


<select class="borda-preta" name="cliente_id">
  <option value="">Selecione um Cliente</option>
  @foreach ($clientes as $cliente)
    <option value="{{$cliente->id}}" {{ ($produto->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : ''}}>{{$cliente->nome}}</option>
  @endforeach
</select>
{{$errors->has('cliente_id') ? $errors->first('cliente_id'): ''}}

  <button type="submit" class="borda-preta">Cadastrar</button>
</form>
