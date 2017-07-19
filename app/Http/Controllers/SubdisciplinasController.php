<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subdisciplina;

class SubdisciplinasController extends Controller
{
  private $subdisciplina;

  public function __construct(Subdisciplina $subdisciplina){
    $this->subdisciplina = $subdisciplina;
  }

  public function getAll(){
    $subdisciplinas = $this->subdisciplina->orderBy('nome')->get();
    return response()->json($subdisciplinas->toArray(), 200);
  }

  public function adicionar(Request $request){
    $this->subdisciplina->create($request->all());
    return response(['message' => 'sucesso', 200]);
  }

  public function editar(Request $request, $id){
    $this->subdisciplina = $this->subdisciplina->findOrFail($id);
      $this->subdisciplina->update($request->all());
      return response(['message' => 'Atualizado com sucesso', 200]);
  }

}
