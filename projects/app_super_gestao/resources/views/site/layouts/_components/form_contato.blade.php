<form action="{{ route('site.contato')}}" method="post">
  @csrf
    <input name="nome" type="text" placeholder="Nome" class="{{$classe}}">
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="{{$classe}}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{$classe}}">
    <br>
    <select class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        <option value="">Dúvida</option>
        <option value="">Elogio</option>
        <option value="">Reclamação</option>
    </select>
    <br>
    <textarea class="{{$classe}}">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>
