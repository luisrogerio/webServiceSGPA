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
    return response()->json(["planoDeAula" => $planosDeAula->toArray()], 200);
  }

  public function adicionar(Request $request){
    $this->planoDeAula->create($request->all());
    return response(['message' => 'sucesso', 200]);
  }

  public function editar(Request $request, $id){
    $this->planoDeAula = $this->planoDeAula->findOrFail($id);
      $this->planoDeAula->update($request->all());
      return response(['message' => 'Atualizado com sucesso', 200]);
  }

}
