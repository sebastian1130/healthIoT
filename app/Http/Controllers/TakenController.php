<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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

        return view('taken.show', array_merge(['data' => $datos],['sis' => $system],['medidas' => $meas]));
        // return view('taken.show', array_merge(['data' => $system]));
      } catch (\Exception $e) {
        echo "nai";
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
