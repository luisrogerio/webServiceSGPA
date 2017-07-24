<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subdisciplina extends Model
{
    protected $table = 'subdisciplinas';

    protected $fillable = [
        'nome'
    ];

    public function disciplina()
    {
      return $this->belongsTo('App\Models\Disciplina', 'disciplinas_id');
    }
}
