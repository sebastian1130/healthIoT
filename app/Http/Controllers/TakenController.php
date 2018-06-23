<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use App\medicion;
use App\Taken;
use App\sistema;
use App\User;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TakenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function getMeas(Request $request, $identificacion, $vPS, $vPD, $vT){
      // $medicions = sistema::find($identificacion)->takens;
      $sis = sistema::where('identificacion', $identificacion)->get()->first();
      // echo var_dump($sis);
      $input = array('valorPS'=>$vPS, 'valorPD'=>$vPD, 'valorT'=>$vT, 'sistema_id'=>$sis->id);
      // echo $input;
      Taken::create($input);
      $medi = sistema::find($sis->id)->medicions->first();
      // echo var_dump($medi);
      $user = User::find($sis->user_id);
      $age = $user->edad;
      $sendEmail = 0;
      switch(true){
        case ($age>16 && $age<30):
          if($vPS<100 || $vPS>139 || $vPD<60 || $vPD>89 || $vT<36.5 || $vT>37.5){
            $sendEmail = 1;
          }
          break;
        case ($age>=30 && $age<39):
          if($vPS<105 || $vPS>145 || $vPD<65 || $vPD>96 || $vT<36.5 || $vT>37.5){
            $sendEmail = 1;
          }
          break;
        case ($age>=49):
          if($vPS<105 || $vPS>160 || $vPD<65 || $vPD>100 || $vT<36.5 || $vT>37.5){
            $sendEmail = 1;
          }
          break;
        default:
          $sendEmail = 0;
          break;
      }
      if($sendEmail == 1){
        $objDemo = new \stdClass();
        $objDemo->identi = $user->identificacion;
        $objDemo->ema = $user->email;
        $objDemo->sist = $vPS;
        $objDemo->diast = $vPD;
        $objDemo->temp = $vT;
        $objDemo->sender = 'Health Care';
        $objDemo->receiver = $user->name;
        Mail::to($user->email)->send(new SendEmail($objDemo));
        // echo "Correo enviado!";
      }
      echo 200;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
      try {
        $datos = sistema::findOrFail($id)->medicions->first();
        $meas = sistema::findOrFail($id)->takens;
        $system = sistema::findOrFail($id);
        $user = User::findOrFail($system->user_id);

        return view('taken.show', array_merge(['data' => $datos],['sis' => $system],['medidas' => $meas],['user' => $user]));
        // return view('taken.show', array_merge(['data' => $system]));
      } catch (\Exception $e) {
        Session::flash('flash_message','No es posible mostrar tus medidas, comunícate con nosotros para solucionar el problema.');
        return redirect()->back();
      }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
