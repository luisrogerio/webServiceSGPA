<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table = 'disciplinas';

    protected $fillable = [
        'nome'
    ];

    public function subdisciplinas(){
      $this->hasMany('App\Models\Subdisciplina', 'disciplinas_id');
    }
}
