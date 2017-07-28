<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanoDeAula;

class PlanosDeAulaController extends Controller
{
  private $planoDeAula;

  public function __construct(PlanoDeAula $planoDeAula){
    $this->planoDeAula = $planoDeAula;
  }

  public function getAll(){
    $planosDeAula = $this->planoDeAula->orderBy('titulo')->get();
    return response()->json($planosDeAula->toArray(), 200);
  }

  public function visualizar($id){
    $planoDeAula = $this->planoDeAula->findOrFail($id);
    return response($planoDeAula->toArray(), 200);
  }

  public function adicionar(Request $request){
    Log::info('O seu request é', $request);
    $planoDeAula = $this->planoDeAula->create($request->all());
    if($planoDeAula->id){
      return response()->json([$planoDeAula], 200);
    } else {
      return response()->json([$request], 500);
    }
  }

  public function editar(Request $request, $id){
    $this->planoDeAula = $this->planoDeAula->findOrFail($id);
      $this->planoDeAula->update($request->all());
      return response(['message' => 'Atualizado com sucesso', 200]);
  }

}
