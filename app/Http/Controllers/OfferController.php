<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    //
    function getData()
    {
        return Offer::all();
    }
    function getDataDO($id)
    {
        $data = Offer::where('id', $id)->first();
        return view('dettagliOfferta', ['tuple'=>$data]);
    }

    function getDataOff()
    {
        $data = Offer::all();
        return view('gestioneOfferte', ['List'=>$data]);
    }
    function deleteR($id)
    {
        // Trova la riga nel database
        $row = Offer::findOrFail($id);

        // Elimina la riga
        $row->delete();

        // Esempio di reindirizzamento alla pagina principale
        return redirect()->route('gestioneOfferte')->with('message', 'Offerta eliminata con successo.');
    }
    function addOff(Request $request){

        $off = new Offer();
        $root = "root";
        $nomeA = $request->input('idAzienda');
        $azienda = Factory::where('nome', $nomeA)->first();
        $off['idAzienda'] = $azienda['id'];
        $off['nome'] = $request->input('nome');
        $off['oggetto'] = $request->input('oggetto');
        $off['modalitaFruizione'] = $request->input('modalitaFruizione');
        $off['dataOraScadenza'] = $request->input('dataOraScadenza');
        $off['luogoFruizione'] = $request->input('luogoFruizione');
        $off['immagine'] = $request->input('immagine');
        $off->save();

        return redirect()->route('gestioneOfferte');
//        return view('modificaFAQ');
    }

    function getNomeAziende()
    {
     $data = Factory::all('nome');
     return view('inserisciOfferte', ['ListaNomi'=>$data]);
    }

    function getDataSingleOff($id){
        $dataAziende = Factory::all('nome');
        $data = Offer::where('id', $id)->first();
        return view('aggiornaOfferte', ['dati'=>$data], ['ListaNomi'=>$dataAziende]);
    }

    function updateDataSingleOff(Request $request, $id)
    {
        $record = Offer::where('id', $id)->first();
        $record['idAzienda'] = $request->input('idAzienda');
        $record['nome'] = $request->input('nome');
        $record['oggetto'] = $request->input('oggetto');
        $record['modalitaFruizione'] = $request->input('modalitaFruizione');
        $record['dataOraScadenza'] = $request->input('dataOraScadenza');
        $record['luogoFruizione'] = $request->input('luogoFruizione');
        $record['immagine'] = $request->input('immagine');
        $record->update();
        return redirect()->route('gestioneOfferte');
    }
}
