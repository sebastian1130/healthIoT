<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\medicion;
use App\sistema;
use App\User;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class MedicionController extends Controller
{

  public function addRef(Request $request, $id){
    $data = sistema::find($id);
    return view('medicion.addRef', ['sis' => $data]);
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function addData(Request $request, $id){


    $this->validate($request, [
      'valorPD' => 'required',
      'valorPS' => 'required',
      'valorT' => 'required',
    ]);
    $input = array_merge($request->all(),array_merge(['ref' => 1], ['sistema_id' => $id]));
    // $input = array_merge($request->all(),['ref' => 1]);
    //$input = $request->all();
    //$sys = sistema::find($id);
    //$Sistema = new sistema($input);
    //$sys->save(array($Sistema));
    medicion::create($input);
    $datos = sistema::findOrFail($id)->medicions->first();
    $meas = sistema::findOrFail($id)->takens;
    $system = sistema::findOrFail($id);
    return view('taken.show', array_merge(['data' => $datos],['sis' => $system],['medidas' => $meas]));

  }
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
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      try{
        $med = medicion::findOrFail($id)->first();
        return view('medicion.modRef', ['sis'=>$med]);
        }
      catch(ModelNotFoundException $e)
        {
          Session::flash('flash_message',"Las medidas de referencia ($id) no pueden ser editadas");
          return redirect()->back();
        }
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
      try{
        $med=medicion::findOrFail($id);
        $this->validate($request, [
          'valorPD' => 'required',
          'valorPS' => 'required',
          'valorT' => 'required',
        ]);
        $input = $request->all();
        $med->fill($input)->save();
        Session::flash('flash_message', 'Mediciones correctamente editadas');
        $datos = sistema::findOrFail($id)->medicions->first();
        $meas = sistema::findOrFail($id)->takens;
        $system = sistema::findOrFail($id);
        return view('taken.show', array_merge(['data' => $datos],['sis' => $system],['medidas' => $meas]));
      }
      catch(ModelNotFoundExcetion $e)
        {
            Session::flash('flash_message','Las medidas de referencia ($id) no pudieron ser editadas');
            return redirect()->back();
        }
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
