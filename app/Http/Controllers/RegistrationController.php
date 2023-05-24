<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RegistrationController extends Controller
{
    public function register(Request $request){

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
