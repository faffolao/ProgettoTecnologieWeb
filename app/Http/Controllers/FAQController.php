<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
    //
    function getData()
    {
        $data = FAQ::all();
        return view('gestioneFAQ', ['List'=>$data]);
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
        return redirect()->route('gestioneFAQ');
    }
    function getForm()
    {
        return view('inserisciFAQ');
    }
    function addFAQ(Request $request){

        // Validazione dei dati inviati nella form
//        $validatedData = $request->validate([
//            'domanda' => 'required|string',
//            'risposta' => 'required|string',
//        ]);

        $faq = new FAQ;
        $root = User::where('livello', 3)->first();
//        $root = "root";
        $faq['domanda'] = $request->input('domanda');
        $faq['risposta'] = $request->input('risposta');
        $faq['usernameCreatore'] = $root['username'];
        $faq->save();

        return redirect()->route('gestioneFAQ');
//        return view('modificaFAQ');
    }
    function getDataSingleFAQ($id){
        $data = FAQ::where('id', $id)->first();
        return view('aggiornaFAQ', ['dati'=>$data]);
    }

    function updateDataSingleFAQ(Request $request, $id)
    {
        $record = FAQ::where('id', $id)->first();
        $record['domanda'] = $request->input('domanda');
        $record['risposta'] = $request->input('risposta');
        $record->update();
        return redirect()->route('gestioneFAQ');
    }
}
