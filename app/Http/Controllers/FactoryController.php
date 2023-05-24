<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Factory;
use Illuminate\Support\Facades\DB;

define("NUM_PAGES", 12);

class FactoryController extends Controller
{
    // C = Catalogo
    function getDataC()
    {
        // Ordino la lista di offerte in base all'ID dell'azienda, questo per far si che le offerte della stessa azienda
        // compaiano tutte di seguito.
        $dataAO = Offer::orderBy('idAzienda')->paginate(9);
        return view('catalogo', ['Offerte'=>$dataAO]);
    }

    // A = Aziende
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

    // GA = Gestione Aziende
    function getDataGA()
    {
        $data = Factory::all();
        return view('gestioneAziende', ['List'=>$data]);
    }

    // BRGA = Barra di Ricerca in Gestione Staff
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

        //Controlla se i campi sono stati compilati correttamente
        $request->validate([
            'nome' => ['required','string','max:40', 'unique:aziende'],
            'tipologia' => ['required','string','max:30'],
            'descrizione' => ['required','string'],
            'ragioneSociale' => ['string','max:50']
        ]);

        $factory = new Factory();
        $admin = User::where('livello', 3)->first();
        $immagine = $request->file('logo');
        $logo = file_get_contents($immagine);
        $factory['nome'] = $request->input('nome');
        $factory['tipologia'] = $request->input('tipologia');
        $factory['descrizione'] = $request->input('descrizione');
        $factory['logo'] = $logo;
        $factory['ragioneSociale'] = $request->input('ragioneSociale');
        $factory['managerUsername'] = $admin['username'];
        $factory->save();

        return redirect()->route('gestioneAziende');
    }

    function getDataSingleAzienda($id){
        $data = Factory::where('id', $id)->first();
        return view('aggiornaAziende', ['dati'=>$data]);
    }

    function updateDataSingleAzienda(Request $request, $id)
    {
        //Controlla se i campi sono stati compilati correttamente
        $request->validate([
            'nome' => ['required','string','max:40', 'unique:aziende'],
            'tipologia' => ['required','string','max:30'],
            'descrizione' => ['required','string'],
            'ragioneSociale' => ['string','max:50']
        ]);

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

            //Controlla se i campi sono stati compilati correttamente
            $request->validate([
                'logo' => ['required','file','mimes:jpg,jpeg,png,bin'],
            ]);

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
        return redirect()->route('gestioneAziende');
    }
}
