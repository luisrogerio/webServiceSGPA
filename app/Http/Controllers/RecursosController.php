<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recurso;

class RecursosController extends Controller
{
  private $recurso;

  public function __construct(Recurso $recurso){
    $this->recurso = $recurso;
  }

  public function getAll(){
    $recursos = $this->recurso->orderBy('nome')->get();
    return response()->json($recursos->toArray(), 200);
  }

  public function adicionar(Request $request, $momentoId){
    $momento = Momento::findOrFail($momentoId);
    $this->recurso->fill($request->all());
    $momento->recursos()->save($this->recurso);
    return response()->json(['message' => 'Adicionado com sucesso'], 200);
  }

  public function editar(Request $request, $id){
    $this->recurso = $this->recurso->findOrFail($id);
    $recurso = $this->recurso->update($request->all());
    return response()->json($recurso->toArray(), 200);
  }

  public function deletar($id){
    $this->recurso = $this->recurso->findOrFail($id);
    if($this->recurso->delete()){
      return response()->json(["message"=>"Recurso deletado com sucesso"], 200);
    }
  }

}
