<?php

namespace App;
use App\User;
use App\medicion;
use App\Taken;

use Illuminate\Database\Eloquent\Model;

class sistema extends Model
{
    //
    protected $fillable = [
      'nombre', 'identificacion', 'descripcion', 'prioridad', 'user_id'
    ];
    public function medicions(){
      return $this->hasMany('App\medicion', 'sistema_id', 'id');
    }
    public function takens(){
      return $this->hasMany('App\Taken', 'sistema_id', 'id');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
}
