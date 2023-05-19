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
}
