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
    return response()->json($planosDeAula, 200);
  }

  public function adicionar(Request $request){
    
  }

}
