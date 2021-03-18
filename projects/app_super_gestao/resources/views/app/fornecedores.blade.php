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
<<<<<<< HEAD

<br>

{{-- Isset -> verifica se uma variável existe --}}
@isset($fornecedores2[0]['nome'])
  O nome do fornecedor é: {{$fornecedores2[0]['nome']}}.
@endisset
=======
>>>>>>> def5a0f69c7860d46d2a6db3dd11d8ce6967ac64
