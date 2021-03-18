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
