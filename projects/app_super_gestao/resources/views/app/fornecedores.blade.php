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

<h3>Loop for:</h3>
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
<br>

{{-- While --}}
@php
  $i=0
@endphp

<h3>Loop while:</h3>
@isset($fornecedores3)
  @while(isset($fornecedores3[$i]))
    Fornecedor: {{ $fornecedores3[$i]['nome'] }}
    <br>
    Status: {{ $fornecedores3[$i]['status'] }}
    <br>
    CNPJ: {{ $fornecedores3[$i]['cnpj'] }}
    <br>
    DDD: ({{ $fornecedores3[$i]['ddd'] }})
    <hr>
      @php
        $i++
      @endphp
  @endwhile
@endisset
<br>

{{-- Foreach --}}
<h3>Loop foreach:</h3>
@isset($fornecedores3)
  @foreach($fornecedores3 as $indice => $fornecedor)
    Fornecedor: {{ $fornecedor['nome'] }}
    <br>
    Status: {{ $fornecedor['status'] }}
    <br>
    CNPJ: {{ $fornecedor['cnpj'] }}
    <br>
    DDD: ({{ $fornecedor['ddd'] }})
    <hr>
  @endforeach
@endisset

{{-- Forelse: Executa o loop ao verificar que o array não está vazio, caso contrário desvia o fluxo --}}
<h3>Loop forelse:</h3>
@isset($fornecedores4)
  @forelse($fornecedores4 as $indice => $fornecedor)
    Fornecedor: {{ $fornecedor['nome'] }}
    <br>
    Status: {{ $fornecedor['status'] }}
    <br>
    CNPJ: {{ $fornecedor['cnpj'] }}
    <br>
    DDD: ({{ $fornecedor['ddd'] }})
    <hr>
    @empty
      Não existem fornecedores cadastrados
  @endforelse
@endisset
<br>

{{-- Estudo da variável loop gerada no foreach e forelse e impressão literal dentro da blade --}}
<h3>Estudo da variável loop:</h3>
@isset($fornecedores3)
  @forelse($fornecedores3 as $indice => $fornecedor)
    Iteração atual: {{ $loop->iteration}}
    <br>
    Fornecedor: @{{ $fornecedor['nome'] }}: Impressão da variável literal
    <br>
    Status: {{ $fornecedor['status'] }}
    <br>
    CNPJ: {{ $fornecedor['cnpj'] }}
    <br>
    DDD: ({{ $fornecedor['ddd'] }})
    <br>
    @if ($loop->first)
      Primeira iteração!
    @endif
    @if ($loop->last)
      Última iteração!
    @endif
    <hr>
    @empty
      Não existem fornecedores cadastrados
  @endforelse
@endisset
