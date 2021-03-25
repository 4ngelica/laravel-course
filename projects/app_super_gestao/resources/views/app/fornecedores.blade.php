{{-- Estudo da sintaxe da blade --}}

{{-- Bloco de php puro --}}
@php
@endphp

{{-- Condicional if else na sintaxe da blade --}}
@if(count($fornecedores) > 0 && count($fornecedores) < 10)
<h3>Existem alguns fornecedores.</h3>
@elseif(count($fornecedores) > 10)
<h3>Existem vários fornecedores</h3>
@else
<h3>Ainda não existem fornecedores.</h3>
@endif

{{-- Unless -> executa se houver negação da condição --}}
Status do fornecedor:
@unless($fornecedores2[0]['status'] == 'S')
  Fornecedor inativo.
@endunless

<br>
{{-- Isset -> verifica se uma variável existe --}}
@isset($fornecedores2[0]['nome'])
  O nome do fornecedor é: {{$fornecedores2[0]['nome']}}.
@endisset
<br>

{{-- Empty -> verifica se o valor é vazio (null, false, 0, 0.0, '' etc ) --}}
@empty ($fornecedores[1]['cnpj'])
Esse cnpj é nulo.
@endempty
<br>

{{-- Operador default (??): Verifica se a variavel informada tem um valor, senão atribui um valor default --}}
@isset($fornecedores2)
  O CNPJ é: {{$fornecedores2[1]['cnpj'] ?? 'Valor padrão'}}.
@endisset
<br>

{{-- Switch/case: Realiza ações dependendo do caso e tb pode ter um valor default --}}
@switch($fornecedores2[1]['ddd'])
  @case('11')
  Esse é o DDD da cidade de São Paulo ({{$fornecedores2[1]['ddd']}})
  @break
  @case('85')
  Esse é o DDD da cidade de Fortaleza ({{$fornecedores2[1]['ddd']}})
  @break
  @default
  Cidade não identificada!
@endswitch
<hr>

{{-- For --}}
@for($i = 0; $i < 10; $i++)
  {{$i}}<br>
@endfor

@isset($fornecedores3)
  @for($i = 0; isset($fornecedores3[$i]); $i++)
    Fornecedor: {{ $fornecedores3[$i]['nome'] }}
    <br>
    Status: {{ $fornecedores3[$i]['status'] }}
    <br>
    CNPJ: {{ $fornecedores3[$i]['cnpj'] }}
    <br>
    DDD: ({{ $fornecedores3[$i]['ddd'] }})
    <hr>
  @endfor
@endisset
