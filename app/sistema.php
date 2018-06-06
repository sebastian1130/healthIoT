<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sistema extends Model
{
    //
    protected $fillable = [
      'nombre', 'identificacion', 'descripcion', 'prioridad', 'usuario_id'
    ];
    public function medicions(){
      return $this->hasMany('App/medicion');
    }
    public function user(){
      return $this->belongsTo('App/User');
    }
}
