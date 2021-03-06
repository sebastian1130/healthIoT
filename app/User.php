<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use App\sistema;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rol', 'apellidos', 'identificacion', 'edad',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    ///////////////// ES ESTOO
    public function setPasswordAttribute($plainPassword)
    {
      $this->attributes['password'] = Hash::make($plainPassword);
    }
    ///////////////////////

    public function sistemas(){
      return $this->hasMany('App\sistema', 'user_id', 'id');
    }

    public function isAdmin(){
      if (($this->rol)==1){
        return true;
      }else{
        return false;
      }
}
}
