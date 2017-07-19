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

  public function adicionar(Request $request){
    $this->recurso->create($request->all());
    return response(['message' => 'sucesso', 200]);
  }
}
