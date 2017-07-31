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
    $this->momento->fill($request->all());
    $planoDeAula->momentos()->save($this->momento);
    return response()->json($this->momento, 200);
  }

  public function editar(Request $request, $id){
    $this->momento = $this->momento->findOrFail($id);
    $this->momento->update($request->all());
    return response()->json([$this->momento], 200);
  }

  public function deletar($id){
      $this->momento = $this->momento->findOrFail($id);
      if($this->momento->delete()){
        return response()->json(["message"=>"Momento deletado com sucesso"], 200);
      }
    }

}
