<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        /*
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }
        */

        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:utenti'],
            'password' => ['required', 'string', 'min:8'],
            'nome' => ['required', 'string', 'max:255'],
            'cognome' => ['required', 'string', 'max:255'],
            'eta' => ['required'],
            'genere' => ['required', 'string', 'in:M,F,A'],
            'telefono' => ['string'],
            'email' => ['string', 'email', 'max:255'],
        ]);

        // Creazione dell'utente nel database

        $user = User::create([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'nome' => $request->input('nome'),
            'cognome' => $request->input('cognome'),
            'eta' => $request->input('eta'),
            'genere' => $request->input('genere'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
            'livello' => 1,
        ]);

        // Reindirizza l'utente alla pagina di login
        return redirect()->route('login')->with('success', 'Registrazione completata con successo! Ora puoi effettuare il login.');
    }
}
