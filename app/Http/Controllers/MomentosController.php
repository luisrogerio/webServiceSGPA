<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Momento;
use App\Models\PlanoDeAula;

class MomentosController extends Controller
{
  private $momento;

  public function __construct(Momento $momento){
    $this->momento = $momento;
  }

  public function getAll(){
    $momentos = $this->momento->orderBy('nome')->get();
    return response()->json($momentos->toArray(), 200);
  }

  public function visualizar($id){
    $momento = $this->momento->with('recursos')->findOrFail($id);
    return response()->json($momento->toArray(), 200);
  }

  public function adicionar(Request $request, $planoDeAulaId){
    $planoDeAula = PlanoDeAula::findOrFail($planoDeAulaId);
    $momento = $planoDeAula->momentos()->create($request->all());
    return response()->json($momento, 200);
  }

  public function editar(Request $request, $id){
    $momento = $this->momento->findOrFail($id);
    $momento->update($request->all());
    return response()->json($momento->toArray(), 200);
  }

  public function deletar($id){
      $momento = $this->momento->findOrFail($id);
      if($momento->delete()){
        return response()->json(["message"=>"Momento deletado com sucesso"], 200);
      }
    }

}
