<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;
use App\Models\Factory;

class FactoryController extends Controller
{
    //
    function getDataC()
    {
        $data= Factory::all();
        return view('catalogo', ['Aziende'=>$data]);
    }
    function getDataA()
    {
        $data= Factory::all();
        return view('aziende', ['Aziende'=>$data]);
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
