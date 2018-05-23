<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App/User;

class SiteController extends Controller
{
    public function privateWelcome(Request $request){
      $users=User::All();
      return view('adminPages/adminWelcome', ['users' => $users]);
    }
}
