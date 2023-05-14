<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use App\Models\FAQ;
use App\Models\Offer;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    //
    public function index($idAzienda)
    {
        $data= Factory::all();
        $dataOff= Offer::where('idAzienda', $idAzienda)->get();
        return view('catalogo', ['Aziende'=>$data], ['ListOfferte'=>$dataOff]);
    }
}
