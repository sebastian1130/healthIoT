<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;

class SiteController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
  public function privateWelcome(Request $request){
  //  $users=User::All();
  //  return view('/adminWelcome', ['users' => $users]);
    return view('adminPages/adminWelcome');
  }
}
