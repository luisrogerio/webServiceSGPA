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
}
