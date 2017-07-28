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

  public function adicionar(Request $request, $planoDeAulaId){
    $planoDeAula = PlanoDeAula::findOrFail($planoDeAulaId);
    $this->momento->fill($request->all());
    $planoDeAula->momento()->save($this->momento);
<<<<<<< HEAD
    return response()->json([$this->momento], 200);
=======
    return response->json([$this->momento], 200);
>>>>>>> a323e41a235bad8152ef56158fbd66784d6c9c52
  }

  public function editar(Request $request, $id){
    $this->momento = $this->momento->findOrFail($id);
      $this->momento->update($request->all());
<<<<<<< HEAD
      return response()->json([$this->momento], 200);
=======
      return response->json([$this->momento], 200);
>>>>>>> a323e41a235bad8152ef56158fbd66784d6c9c52
  }

}
