<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Momento extends Model
{
  protected $table = 'momentos';

  protected $fillable = [
    'nome',
    'texto'
  ];

  public function planoDeAula(){
    return $this->belongsTo('App\Models\PlanoDeAula', 'planos_de_aulas_id');
  }
}
