<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
    //
        function getData()
    {
//        return FAQ::all('domanda');
        $data= FAQ::all('domanda', 'risposta');
//        $dataR= FAQ::all('risposta');
        return view('homepage', ['List'=>$data]);
    }
}
