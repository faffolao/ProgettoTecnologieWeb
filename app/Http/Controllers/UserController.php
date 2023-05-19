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
     public function getDataBR(Request $request)
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
}
