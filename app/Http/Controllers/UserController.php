<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $users = User::all();
      return view('user.index', ['list' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      return view('user.create');
        //return View::make('user.create')->with(compact('users'));

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
         'name' => 'required | string  | max:66',
         'apellidos' => 'required | string  | max:66',
         'email' => 'required | email| unique:users',
         'identificacion' => 'required | string | max:66 | unique:users',
         'password' => 'required | string | min:8 | max:64',
     ]);
     $input = $request->all();
     User::create($input);
     Session::flash('flash_message', 'Usuario exitosamente agregado');
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
        $user = User::findOrFail($id);
        return view('user.show',['data'=>$user]);
        }
      catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message',"El usuario ($id) no se ha encontrado");
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
      try{
        $user=User::findOrFail($id);
        return view('user.edit',['data'=>$user]);
        }
      catch(ModelNotFoundException $e)
        {
          Session::flash('flash_message',"El usuario ($id) no puede ser editado");
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
        $user=User::findOrFail($id);
        $this->validate($request, [
          'name' => 'required | string',
          'apellidos' => 'required | nullable | string',
          'email' => 'required | email',
          'identificacion' => 'required | max:10 | min:10',
          'password' => 'required | string | min:8 | max:64',
          'rol' => 'required | string',
        ]);
        $input = $request->all();
        $user->fill($input)->save();
        Session::flash('flash_message', 'Usuario editado correctamente');
        return redirect('/users');
      }
      catch(ModelNotFoundExcetion $e)
        {
            Session::flash('flash_message','El usuario ($id) no pudo ser editado');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      try
      {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('flash_message', 'Usuario eliminado');
        return redirect('/users');
      }
      catch(ModelNotFoundException $e)
      {
        Session::flash('flash_message', "El usuario ($id) no fue eliminado");
        return redirect()->back();
      }
    }
}
