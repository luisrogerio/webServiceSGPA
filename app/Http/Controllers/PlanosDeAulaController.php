<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanoDeAula;
use Illuminate\Support\Facades\Log;

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
    $planoDeAula = $this->planoDeAula->with('momentos')->findOrFail($id);
    return response()->json($planoDeAula->toArray(), 200);
  }

  public function adicionar(Request $request){
    $planoDeAula = $this->planoDeAula->create($request->all());
    if($planoDeAula->id){
      return response()->json($planoDeAula->toArray(), 200);
    } else {
      return response()->json(['msg' => 'Erro ao salvar'], 500);
    }
  }

  public function editar(Request $request, $id){
    $this->planoDeAula = $this->planoDeAula->findOrFail($id);
    $planoDeAula = $this->planoDeAula->update($request->all());
    return response()->json($planoDeAula->toArray(), 200);
  }

  public function deletar($id){
      $this->planoDeAula = $this->planoDeAula->findOrFail($id);
      if($this->planoDeAula->delete()){
        return response()->json(["message"=>"Plano de Aula deletado com sucesso"], 200);
      }
    }

}
