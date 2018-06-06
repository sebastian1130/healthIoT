<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sistema;
use App\User;
use Session;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Model;


class SistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */
    public function index(Request $request)
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users = User::all();

      return view('sistema.create', ['users' => $users]);
      // return view('sistema.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validate($request, [
         'nombre' => 'required | string  | max:66',
         'identificacion' => 'required | string  | max:15',
         'descripcion' => 'required | string  | max:120',
         // 'user_id' => $userid,
     ]);
     // $input = $request->all();
     // $request->request->add(['user_id' => $userid]);
     // $input = array_merge($request->all(),['user_id' => $userid]);
     // echo var_dump($input);
     // $input2 = $input;
     $userid = (!Auth::guest()) ? Auth::user()->id : null;
     // $user_id['user_id'] = $userid;
     // sistema::create($input);
     // $sis = new sistema;

     // $sis->user_id = $userid;
     // $sis->save;
     // sistema::update('user_id', $userid);
     $Sistema = new sistema($request->all());
     Auth::user()->sistemas()->save($Sistema);
     // $this->user_id=Auth::user()->id;


     // $sistemas->user_id = $userid;
     Session::flash('flash_message', 'Sistema correctamente agregado');
     return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
      try{
        $users = User::findOrFail($id);
        $systems = User::findOrFail($id)->sistemas;
        return view('sistema.show', array_merge(['list' => $users], ['system' => $systems]));
      }
      catch(ModelNotFoundException $e)
      {
        Session::flash('flash_message',"No se ha encontrado ningún sistema");
        $systems = sistema::find($id);
        echo $systems;
        // return redirect()->back();
        echo "nope";
      }
      // array_merge(['list' => $users], ['system' => $systems])
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
          $system=sistema::findOrFail($id);
          // echo var_dump($system);
          return view('sistema.edit',['data'=>$system]);
        }
      catch(ModelNotFoundException $e)
        {
          Session::flash('flash_message',"El sistema ($id) no puede ser editado");
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
        $system = sistema::findOrFail($id);
        $this->validate($request, [
         'nombre' => 'required | string  | max:66',
         'identificacion' => 'required | string  | max:15',
         'descripcion' => 'required | string  | max:120',
       ]);
       $input = $request->all();
       $system->fill($input)->save();
       Session::flash('flash_message', 'Sistema editado correctamente');
       $users = User::findOrFail($system->user_id);
       $systems = User::findOrFail($system->user_id)->sistemas;
       return view('sistema.show', array_merge(['list' => $users], ['system' => $systems]));
     }
     catch(ModelNotFoundExcetion $e)
       {
           Session::flash('flash_message','El sistema ($id) no pudo ser editado');
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
      try
      {
        $system = sistema::findOrFail($id);
        $system->delete();
        Session::flash('flash_message', 'Sistema eliminado');
        $users = User::findOrFail($system->user_id);
        $systems = User::findOrFail($system->user_id)->sistemas;
        return view('sistema.show', array_merge(['list' => $users], ['system' => $systems]));
      }
      catch(ModelNotFoundException $e)
      {
        Session::flash('flash_message', "El usuario ($id) no fue eliminado");
        return redirect()->back();
      }
    }
}
