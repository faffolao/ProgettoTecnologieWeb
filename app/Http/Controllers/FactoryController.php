<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Models\Factory;

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
}
