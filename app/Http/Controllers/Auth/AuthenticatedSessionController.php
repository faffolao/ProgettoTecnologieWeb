<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */

    public function create()
    {
        return view('login');
    }
/*
    public function store(LoginRequest $request): Response
    {

        $request->authenticate();

        $request->session()->regenerate();

        $role = auth()->user()->role;

        switch ($role) {
            case '1':
                return redirect()->route('hubUtente');
                break;
            case '2':
                return redirect()->route('hubStaff');
                break;
            case '3':
                return redirect()->route('hubAmministratore');
            default:
                return redirect('/');
        }

    }
*/

    public function store(Request $request)
    {
    //    $credentials = $request->validate([
    //        'username' => ['required', 'string'],
    //        'password' => ['required', 'string'],
    //    ]);

        $request->authenticate();

        $request->session()->regenerate();

      //  if (Auth::attempt($credentials)) {

            $livello = auth()->user()->livello;

            switch ($livello) {
                case User::LIVELLO_1:
                    return redirect()->route('hubUtente');
                case User::LIVELLO_2:
                    return redirect()->intended('/hubStaff');
                case User::LIVELLO_3:
                    return redirect()->intended('/hubAmministratore');
                default:
                    return redirect()->intended('/');
            }
        //}

        return redirect()->back()->withErrors([
            'username' => 'Credenziali non valide.',
        ]);
    }
        /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
