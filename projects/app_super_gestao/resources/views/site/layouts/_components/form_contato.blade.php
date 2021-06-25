{{$slot}}
<form action="{{ route('site.contato')}}" method="post">
  @csrf
    <input name="nome" type="text" placeholder="Nome" class="{{$classe}}" value="{{old('nome')}}">
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="{{$classe}}" value="{{old('telefone')}}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{$classe}}" value="{{old('email')}}">
    <br>
    <select class="{{$classe}}" name="motivo_contato">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $motivo_contato->id => $motivo_contato)
          <option value="{{$motivo_contato->id}}" {{old('motivo_contato') == $motivo_contato->id ? 'selected': ''}}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" class="{{$classe}}"> {{(old('mensagem') ==! '') ? old('mensagem'): 'Preencha aqui a sua mensagem
'}}
    </textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>

<div class="" style="width:100%; background-color:gray;">
  <pre>
    {{print_r($errors)}}
  </pre>

</div>
