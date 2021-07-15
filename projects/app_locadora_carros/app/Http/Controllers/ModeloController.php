<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ModeloController extends Controller
{
    public function __construct(Modelo $modelo){
      $this->modelo = $modelo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $modelos = array();
      if($request->has('atributos')){
        $atributos = $request->atributos;
        $modelos = $this->modelo->selectRaw($atributos)->with('marca')->get();
      }else{
        $modelos = $this->modelo->with('marca')->get();
      }
      return response()->json($modelos,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate($this->modelo->rules());
      $image = $request->file('imagem');
      $imagem_urn = $image->store('imagens/modelos','public');

      $modelo = $this->modelo->create([
        'nome' => $request->nome,
        'imagem' => $imagem_urn,
        'marca_id' => $request->marca_id,
        'numero_portas' => $request->numero_portas,
        'lugares' => $request->lugares,
        'air_bag' => $request->air_bag,
        'abs' => $request->abs

      ]);

      $modelo = $this->modelo->create($request->all());
      return response()->json($modelo, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $modelo = $this->modelo->with('marca')->find($id);

      if($modelo ==null){
        return response()->json(['erro'=>'O recurso solicitado não existe.'], 404);
      }
      return response()->json($modelo, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modelo $modelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $modelo = $this->modelo->find($id);

      if($modelo ==null){
        return response()->json(['erro'=>'Impossível realizar a atualização. O recurso solicitado não existe.'], 404);
      }

      if($request->method() === 'PATCH'){
        $regrasDinamicas = array();

        foreach ($modelo->rules() as $input => $regra) {
          if(array_key_exists($input, $request->all())){
            $regrasDinamicas[$input] = $regra;
          }
        }

      }else{
        $request->validate($modelo->rules());

      }

      if($request->file('imagem')){
        Storage::disk('public')->delete($modelo->imagem);
      }

      $image = $request->file('imagem');
      $imagem_urn = $image->store('imagens/modelos','public');
      $modelo->fill($request->all());
      $modelo->imagem =  $imagem_urn;
      $modelo->save();

      $modelo->update([
        'nome' => $request->nome,
        'imagem' => $imagem_urn,
        'marca_id' => $request->marca_id,
        'numero_portas' => $request->numero_portas,
        'lugares' => $request->lugares,
        'air_bag' => $request->air_bag,
        'abs' => $request->abs
      ]);

      return response()->json($modelo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $modelo = $this->modelo->find($id);

      if($modelo ==null){
        return response()->json(['erro'=>'Impossível realizar a exclusão. O recurso solicitado não existe.'], 404);
      }

        Storage::disk('public')->delete($modelo->imagem);

      $modelo->delete();
      return response()->json(['msg' => 'O modelo foi removida com sucesso.'], 200);
    }
}
