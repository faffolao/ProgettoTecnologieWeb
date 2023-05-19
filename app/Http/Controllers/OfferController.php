<?php

namespace App\Http\Controllers;

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
        return view('modificaOfferte', ['List'=>$data]);
    }
    function deleteR($id)
    {
        // Trova la riga nel database
        $row = Offer::findOrFail($id);

        // Elimina la riga
        $row->delete();

        // Esempio di reindirizzamento alla pagina principale
        return redirect()->route('modificaOfferte')->with('message', 'Offerta eliminata con successo.');
    }
    function addOff(Request $request){

        $off = new Offer();
        $root = "root";
        $off['nome'] = $request->input('nome');
        $off['oggetto'] = $request->input('oggetto');
        $off['modalitaFruizione'] = $request->input('modalitaFruizione');
        $off['dataOraScadenza'] = $request->input('dataOraScadenza');
        $off['luogoFruizione'] = $request->input('luogoFruizione');
        $off['immagine'] = $request->input('immagine');
        $off['usernameCreatore'] = $root;
        $off->save();

        return redirect()->route('modificaOfferte');
//        return view('modificaFAQ');
    }

    function getDataSingleOff($id){
        $data = Offer::where('id', $id)->first();
        return view('aggiornaOfferte', ['dati'=>$data]);
    }

    function updateDataSingleOff(Request $request, $id)
    {
        $record = Offer::where('id', $id)->first();
        $record['nome'] = $request->input('nome');
        $record['oggetto'] = $request->input('oggetto');
        $record['modalitaFruizione'] = $request->input('modalitaFruizione');
        $record['dataOraScadenza'] = $request->input('dataOraScadenza');
        $record['luogoFruizione'] = $request->input('luogoFruizione');
        $record['immagine'] = $request->input('immagine');
        $record->update();
        return redirect()->route('modificaFAQ');
    }
}
