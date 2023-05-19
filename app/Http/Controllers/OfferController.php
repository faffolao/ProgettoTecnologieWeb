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

        $faq = new Offer();
        $root = "root";
        $faq['nome'] = $request->input('nome');
        $faq['oggetto'] = $request->input('oggetto');
        $faq['modalitaFruizione'] = $request->input('modalitaFruizione');
        $faq['dataOraScadenza'] = $request->input('dataOraScadenza');
        $faq['luogoFruizione'] = $request->input('luogoFruizione');
        $faq['immagine'] = $request->input('immagine');
        $faq['usernameCreatore'] = $root;
        $faq->save();

        return redirect()->route('modificaOfferte');
//        return view('modificaFAQ');
    }
}
