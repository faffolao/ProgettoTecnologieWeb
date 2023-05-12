<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use App\Models\FAQ;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $dataHome= Factory::all();
        $data= FAQ::all();
        return view('homepage', ['List'=>$data], ['Aziende'=>$dataHome]);
//        return ['factory'=>$dataHome];
//        $factory= $this->getDataFactory();
//        $listFAQ= $this->getDataFAQ();
//
//        return view('homepage', compact('factory', 'listFAQ'));
    }

//    function getDataFAQ()
//    {
//        $data= FAQ::all();
//        return ['listFAQ'=>$data];
//    }
}
