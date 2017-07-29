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

  public $timestamps = false;

  public function planoDeAula(){
    return $this->belongsTo('App\Models\PlanoDeAula', 'planos_de_aulas_id');
  }

  public function recursos(){
    return $this->hasMany('App\Models\Recurso', 'momentos_id');
  }
}
