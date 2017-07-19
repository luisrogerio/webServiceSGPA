<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessoresController extends Controller
{
  private $professor;

  public function __construct(Professor $professor){
    $this->professor = $professor;
  }

  public function getAll(){
    $professores = $this->professor->orderBy('nome')->get();
    return response()->json($professores->toArray(), 200);
  }

  public function adicionar(Request $request){
    $this->professor->create($request->all());
    return response(['message' => 'sucesso', 200]);
  }
}
