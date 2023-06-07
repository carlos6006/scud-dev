<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $usuarios = AuthenticatesUsers::all();
        return view('auth.index',['usuarios'=>$usuarios]);

    }

}
