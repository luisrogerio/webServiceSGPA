<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;

class DisciplinasController extends Controller
{
  private $disciplina;

  public function __construct(Disciplina $disciplina){
    $this->disciplina = $disciplina;
  }

  public function getAll(){
    $disciplinas = $this->disciplina->orderBy('nome')->get();
    return response()->json($disciplinas->toArray(), 200);
  }

  public function adicionar(Request $request){
    if($request->method('ajax')){
      $this->disciplina->create($request->all());
      return response(['message' => 'sucesso', 200]);
    }
  }

}
