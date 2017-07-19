<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professores';

    protected $fillable = [
      'nome',
      'tipo_de_trabalho'
    ];

    public function disciplinas(){
      return $this->belongsToMany('App\Models\Disciplina', 'disciplinas_lecionadas_professores', 'professores_id', 'disciplinas_id');
    }

    public function usuario(){
      return $this->belongsTo('App\Models\User', 'usuarios_id');
    }

}
