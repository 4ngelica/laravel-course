<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Unidade;
use App\Fornecedor;
use App\ProdutoDetalhe;


use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $produtos = Produto::paginate(10);

      // foreach ($produtos as $key => $produto) {
      //   $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();
      //
      //   if(isset($produtoDetalhe)){
      //     $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
      //     $produtos[$key]['largura'] = $produtoDetalhe->largura;
      //     $produtos[$key]['altura'] = $produtoDetalhe->altura;
      //   }
      // }
      return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades'=>$unidades, 'fornecedores' =>$fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
          'nome' => 'required|min:3|max:40',
          'descricao' => 'required|min:3|max:2000',
          'peso' => 'required|integer',
          'unidade_id' => 'exists:unidades,id',
          'fornecedor_id' => 'exists:fornecedores,id'
        ];
        $request->validate($regras);
        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto'=>$produto, 'unidades'=>$unidades, 'fornecedores'=>$fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $regras = [
          'nome' => 'required|min:3|max:40',
          'descricao' => 'required|min:3|max:2000',
          'peso' => 'required|integer',
          'unidade_id' => 'exists:unidades,id',
          'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $request->validate($regras);
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
