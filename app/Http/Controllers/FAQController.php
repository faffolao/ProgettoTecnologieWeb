<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
    //
    function getData()
    {
        $data = FAQ::all();
        return view('modificaFAQ', ['List'=>$data]);
////        return FAQ::all('domanda');
//        $data= FAQ::all();
////        $dataR= FAQ::all('risposta');
//        return view('homepage', ['List'=>$data]);
    }
    function deleteR($id)
    {
        // Trova la riga nel database
        $row = FAQ::findOrFail($id);

        // Elimina la riga
        $row->delete();

        // Esempio di reindirizzamento alla pagina principale
        return redirect()->route('modificaFAQ')->with('message', 'Domanda eliminata con successo.');
    }
}
