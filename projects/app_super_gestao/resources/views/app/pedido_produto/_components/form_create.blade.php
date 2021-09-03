
<form class="" action="{{route('pedido-produto.store',['pedido'=>$pedido, 'produtos'=>$produtos])}}" method="post">
  @csrf
<select class="borda-preta" name="produto_id">
  <option value="">Selecione um Produto</option>
  @foreach ($produtos as $produto)
    <option value="{{$produto->id}}" {{ ($produto->produto_id ?? old('produto_id')) == $produto->id ? 'selected' : ''}}>{{$produto->nome}}</option>
  @endforeach
</select>
{{$errors->has('produto_id') ? $errors->first('produto_id'): ''}}

  <button type="submit" class="borda-preta">Cadastrar</button>
</form>
