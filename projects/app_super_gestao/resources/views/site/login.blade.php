@extends('site.layouts.basico')
@section('titulo','Login')
@section('conteudo')
  @include('site.layouts._partials.topo')


        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Entre em contato conosco</h1>
            </div>

            <div class="informacao-pagina">
              <form action="{{route('site.login')}}" method="post">
                @csrf
                <input class="borda-preta" value="{{old('usuario')}}" type="text" name="usuario" placeholder="Usuário">
                {{$errors->has('usuario') ? $errors->first('usuario') : ''}}
                <input class="borda-preta" value="{{old('senha')}}" type="password" name="senha" placeholder="Senha">
                {{$errors->has('senha') ? $errors->first('senha') : ''}}
                <button class="borda-preta" type="submit">Acessar</button>
              </form>
              {{isset($erro) && $erro != '' ? $erro : ''}}
            </div>
        </div>

        <div class="rodape">
            <div class="redes-sociais">
                <h2>Redes sociais</h2>
                <img src="{{ asset('/img/facebook.png')}}">
                <img src="{{ asset('/img/linkedin.png')}}">
                <img src="{{ asset('/img/youtube.png')}}">
            </div>
            <div class="area-contato">
                <h2>Contato</h2>
                <span>(11) 3333-4444</span>
                <br>
                <span>supergestao@dominio.com.br</span>
            </div>
            <div class="localizacao">
                <h2>Localização</h2>
                <img src="{{ asset('/img/mapa.png')}}">
            </div>
        </div>
@endsection
