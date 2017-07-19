<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanoDeAula extends Model
{
    protected $table = 'planos_de_aula';

    protected $fillable = [
        'titulo',
        'subtitulo',
        'descricao'
    ];

    public function subdisciplinas(){
      return $this->belongsToMany('App\Models\Subdisciplina', 'planos_de_aulas_subdisciplina', 'planos_de_aulas_id', 'subdisciplina_id');
    }
}
