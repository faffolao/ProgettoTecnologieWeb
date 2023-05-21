<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Models\Factory;
use Illuminate\Support\Facades\DB;

define("NUM_PAGES", 12);

class FactoryController extends Controller
{
    function getDataC()
    {
        $data = Factory::all();
        $dataAO = Offer::paginate(9);
        return view('catalogo', ['Aziende'=>$data], ['Offerte'=>$dataAO]);
    }
    function getDataA()
    {
        $data = Factory::paginate(NUM_PAGES);
        return view('aziende', ['Aziende'=>$data]);
    }

    // DA = Dettagli Azienda
    public function getDataDA($nome)
    {
        $data = Factory::where('nome', $nome)->first();
        return view('dettagliAzienda', ['tuple'=>$data]);
    }

    // BR = Barra Ricerca
    public function getDataBR(Request $request)
    {
        $query = $request->input('query');
        $dataNO = Factory::where('nome', 'LIKE', '%' .$query. '%')->paginate(NUM_PAGES);
        return view('aziende', ['Aziende' => $dataNO, 'searchQuery' => $query]);
    }

    function getDataGA()
    {
        $data = Factory::all();
        return view('gestioneAziende', ['List'=>$data]);
    }

    // per la Barra di Ricerca in gestioneStaff
    function getDataBRGA(Request $request)
    {
        $data = Factory::all();
        $query = $request->input('query');
        $dataN = Factory::where('nome', 'LIKE', '%' .$query. '%')->get();
        return view('gestioneAziende', ['Azienda'=>$data], ['List'=>$dataN]);
    }
    function deleteA($id)
    {
        // Trova la riga nel database
        // Elimina la riga
        DB::table('aziende')->where('id', $id)->delete();

        // Esempio di reindirizzamento alla pagina principale
        return redirect()->route('gestioneAziende');
    }
    function addAzienda(Request $request){

        // Validazione dei dati inviati nella form
//        $validatedData = $request->validate([
//            'domanda' => 'required|string',
//            'risposta' => 'required|string',
//        ]);
        $factory = new Factory();
        $admin = "root";
        $immagine = $request->file('logo');
        $logo = file_get_contents($immagine);
        $factory['nome'] = $request->input('nome');
        $factory['tipologia'] = $request->input('tipologia');
        $factory['descrizione'] = $request->input('descrizione');
        $factory['logo'] = $logo;
        $factory['ragioneSociale'] = $request->input('ragioneSociale');
        $factory['managerUsername'] = $admin;
        $factory->save();

        return redirect()->route('gestioneAziende');
//        return view('modificaFAQ');
    }
    function getDataSingleAzienda($id){
        $data = Factory::where('id', $id)->first();
        return view('aggiornaAziende', ['dati'=>$data]);
    }

    function updateDataSingleAzienda(Request $request, $id)
    {
        if (!$request->file('logo'))
        {
            Factory::where('id', $id)->update(
                [
                    'nome'=>$request->input('nome'),
                    'descrizione'=>$request->input('descrizione'),
                    'tipologia'=>$request->input('tipologia'),
                    'ragioneSociale'=>$request->input('ragioneSociale')
                ]);
        } else
        {
            $immagine = $request->file('logo');
            $logo = file_get_contents($immagine);
            Factory::where('id', $id)->update(
                [
                    'nome'=>$request->input('nome'),
                    'descrizione'=>$request->input('descrizione'),
                    'tipologia'=>$request->input('tipologia'),
                    'ragioneSociale'=>$request->input('ragioneSociale'),
                    'logo'=>$logo
                ]);
        }
//        $user['username'] = $request->input('username');
//        $user['nome'] = $request->input('nome');
//        $user['cognome'] = $request->input('cognome');
//        $user['eta'] = $request->input('eta');
//        $user['password'] = $request->input('password');
//        $user['email'] = $request->input('email');
//        $user['telefono'] = $request->input('telefono');
//        $user['genere'] = $request->input('genere');
//        $user->update();
        return redirect()->route('gestioneAziende');
    }
}
