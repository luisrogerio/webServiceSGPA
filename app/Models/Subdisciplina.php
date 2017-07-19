<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subdiscplina extends Model
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
