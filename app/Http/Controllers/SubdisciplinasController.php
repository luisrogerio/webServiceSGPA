<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subdisciplina;

class SubsubsubdisciplinasController extends Controller
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
    if($request->method('ajax')){
      $this->subdisciplina->create($request->all());
      return response(['message' => 'sucesso', 200]);
    }
  }
}
