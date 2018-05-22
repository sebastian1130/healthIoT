<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicion extends Model
{
    //
  protected $fillable = [
    'sensor', 'valor', 'hora', 'fecha', 'sistema_id'
  ];
  public function sistema(){
    return $this->belongsTo('App/sistema');
  }
}

///////// RECORDAR QUE MI SISTEMA TIENE RELACIONES ASÍ
/*
1 USUARIO TIENE N SISTEMAS Y 1 SISTEMA TIENE N mediciones
ENTONCES FIJARSE EN ESTE Y LOS OTROS DOCUMENTOS......



*/
