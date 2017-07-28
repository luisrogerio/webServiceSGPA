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

    public function momentos(){
      return $this->hasMany('App\Models\Momento', 'planos_de_aulas_id');
    }
}
