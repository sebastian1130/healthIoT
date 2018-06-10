<?php

namespace App;
use App\sistema;

use Illuminate\Database\Eloquent\Model;

class medicion extends Model
{
    //
  protected $fillable = [
    'valorPS', 'valorPD', 'valorT', 'sistema_id', 'ref'
  ];
  public function sistema(){
    return $this->belongsTo('App\sistema');
  }
}
