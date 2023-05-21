<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    function index()
    {
        return "API data will be here";
    }
    function getData()
    {
        return User::all();
    }

    // per la Barra di Ricerca in CancellazioneClienti
    public function getDataBRCC(Request $request)
    {
        $data = User::all();
        $query = $request->input('query');
        $dataUN = User::where('username', 'LIKE', '%' .$query. '%')->get();
        return view('cancellazioneClienti', ['Clienti'=>$data], ['List'=>$dataUN]);
    }
    function deleteC($username)
    {
//        // Trova la riga nel database
//        $row = User::where('username', $username)->firstOrFail();
//
//        // Elimina la riga
//        $row->delete();

        //In questo caso è stata necessaria una query cruda perchè non riconosceva l'id username
        DB::table('utenti')->where('username', $username)->delete();

        // Esempio di reindirizzamento alla pagina principale
        return redirect()->route('cancellazioneClienti');
    }

    function getDataClienti()
    {
        $data = User::all();
        return view('cancellazioneClienti', ['List'=>$data]);
    }

    function getDataGS()
    {
        $data = User::all('username');
        return view('gestioneStaff', ['List'=>$data]);
    }

    // per la Barra di Ricerca in gestioneStaff
    function getDataBRGS(Request $request)
    {
        $data = User::all();
        $query = $request->input('query');
        $dataUN = User::where('username', 'LIKE', '%' .$query. '%')->get();
        return view('gestioneStaff', ['Staff'=>$data], ['List'=>$dataUN]);
    }
    function deleteS($username)
    {
        // Trova la riga nel database
        // Elimina la riga
        DB::table('utenti')->where('username', $username)->delete();

        // Esempio di reindirizzamento alla pagina principale
        return redirect()->route('gestioneStaff');
    }
    function addStaff(Request $request){

        // Validazione dei dati inviati nella form
//        $validatedData = $request->validate([
//            'domanda' => 'required|string',
//            'risposta' => 'required|string',
//        ]);

        $user = new User();
        $livello = 2;
        $user['username'] = $request->input('username');
        $user['nome'] = $request->input('nome');
        $user['cognome'] = $request->input('cognome');
        $user['eta'] = $request->input('eta');
        $user['password'] = $request->input('password');
        $user['email'] = $request->input('email');
        $user['telefono'] = $request->input('telefono');
        $user['genere'] = $request->input('genere');
        $user['livello'] = $livello;
        $user->save();

        return redirect()->route('gestioneStaff');
//        return view('modificaFAQ');
    }
    function getDataSingleStaff($username){
        $data = User::where('username', $username)->first();
        return view('aggiornaStaff', ['dati'=>$data]);
    }

    function updateDataSingleStaff(Request $request, $username)
    {
        User::where('username', $username)->update(
            [
                'username'=>$request->input('username'),
                'nome'=>$request->input('nome'),
                'cognome'=>$request->input('cognome'),
                'eta'=>$request->input('eta'),
                'password'=>$request->input('password'),
                'email'=>$request->input('email'),
                'telefono'=>$request->input('telefono'),
                'genere'=>$request->input('genere')
            ]);
//        $user['username'] = $request->input('username');
//        $user['nome'] = $request->input('nome');
//        $user['cognome'] = $request->input('cognome');
//        $user['eta'] = $request->input('eta');
//        $user['password'] = $request->input('password');
//        $user['email'] = $request->input('email');
//        $user['telefono'] = $request->input('telefono');
//        $user['genere'] = $request->input('genere');
//        $user->update();
        return redirect()->route('gestioneStaff');
    }
}
