<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.registrazione');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        /*
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'min:8', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
        */

        // Validazione dei dati inviati dalla form di registrazione
        $request->validate([
            'username' => ['required','string', 'max:255', 'unique:utenti'],
            'password' => ['required','string','min:8'],
            'nome' => ['required','string','max:255'],
            'cognome' => ['required','string','max:255'],
            'eta' => ['required'],
            'genere' => ['required','string','in:M,F,A'],
            'telefono' => ['string'],
            'email' => ['string','email','max:255'],
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
