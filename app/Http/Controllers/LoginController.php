<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function create()
    {
        return view('login');
    }


    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            switch ($user->livello) {
                case User::LIVELLO_1:
                    return redirect()->intended('/hubUtente');
                case User::LIVELLO_2:
                    return redirect()->intended('/hubStaff');
                case User::LIVELLO_3:
                    return redirect()->intended('/hubAmministratore');
                default:
                    return redirect()->intended('/');
            }
        }

        return redirect()->back()->withErrors([
            'username' => 'Credenziali non valide.',
        ]);

        /*
         *
         *
         *
         *
         *
         *  public function login()
        {
            if(Auth::check()) {
                return view('pages.loginform');
            }else{
                return redirect('logout');
            }
        }

        public function handleLogin(Request $request)
        {
            $data = $request->only('username','password');

            if (Auth::attempt($data,$request->remember)) {
                return view('home');
            }else{
                return view('pages.loginform')->with(array('error' => 1));
            }
        }
         */
    }
}
