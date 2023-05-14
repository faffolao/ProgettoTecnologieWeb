<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Models\Factory;

class FactoryController extends Controller
{
    //
    function getDataC()
    {
        $data= Factory::all();
        $dataAO= Offer::all();
        return view('catalogo', ['Aziende'=>$data], ['Offerte'=>$dataAO]);
    }
    function getDataA()
    {
        $data= Factory::all();
        return view('aziende', ['Aziende'=>$data]);
    }
    public function getDataDA($nome)
    {
        $data= Factory::where('nome', $nome)->first();
        return view('dettagliAzienda', ['tuple'=>$data]);
    }
//        function getDataHome()
//    {
//        $dataHome= Factory::all();
//        return view('homepage', ['Aziende'=>$dataHome]);
//    }
//    function show()
//    {
//        return view('list');
//    }
}
