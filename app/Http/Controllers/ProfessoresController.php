<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\User;

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
    $usuario = User::create([
      'login' => $request->login,
      'password' => bycript($request->password)
    ]);
    $this->professor->usuario()->associate($usuario);
    $this->professor->create($request->all());

    return response(['message' => 'sucesso', 200]);
  }

  public function editar(Request $request, $id){
    $this->professor = $this->professor->findOrFail($id);
    $this->professor->update($request->all());
    return response(['message' => 'Atualizado com sucesso', 200]);
  }

}
