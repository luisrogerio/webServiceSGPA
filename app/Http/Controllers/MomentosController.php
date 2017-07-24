<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Momento;

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

  public function adicionar(Request $request){
    $this->momento->create($request->all());
    return response(['message' => 'Salvo com sucesso', 200]);
  }

  public function editar(Request $request, $id){
    $this->momento = $this->momento->findOrFail($id);
      $this->momento->update($request->all());
      return response(['message' => 'Atualizado com sucesso', 200]);
  }

}
