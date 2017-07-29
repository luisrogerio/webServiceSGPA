<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
  protected $table = 'recursos';

  public $timestamps = false;

  protected $fillable = [
      'link'
  ];

  public function momento()
  {
    return $this->belongsTo('App\Models\Momento', 'momentos_id');
  }
}
