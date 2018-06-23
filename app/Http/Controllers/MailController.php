<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\medicion;
use App\Taken;
use App\sistema;

class MailController extends Controller
{
  public function send()
  {
    $pro = sistema::where('identificacion', '1098311083a')->get()->first();
    $user = User::find($pro->user_id);
    $objDemo = new \stdClass();
    $objDemo->demo_one = $user->identificacion;
    $objDemo->demo_two = $user->email;
    $objDemo->sender = 'Health Care';
    $objDemo->receiver = $user->name;
    Mail::to($user->email)->send(new SendEmail($objDemo));
    echo "Correo enviado!";
  }
}
