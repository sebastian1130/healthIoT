<?php

namespace App;
use App\sistema;

use Illuminate\Database\Eloquent\Model;

class Taken extends Model
{
  protected $fillable = [
    'valorPS', 'valorPD', 'valorT', 'sistema_id',
  ];
  public function sistema(){
    return $this->belongsTo('App\sistema');
  }
}
