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
        $data = Factory::all();
        $dataOff = Offer::where('idAzienda', $idAzienda)->get();
        return view('catalogo', ['Aziende'=>$data], ['ListOfferte'=>$dataOff]);
    }
    public function getDataBR(Request $request)
    {
        $data = Factory::all();
        $query = $request->input('query');
        $dataNO = Offer::where('nome', 'LIKE', '%' .$query. '%')
            ->orWhere('oggetto', 'LIKE', '%' .$query. '%')
            ->get();
//        $dataO = Offer::where('oggetto', 'LIKE', '%' .$query. '%')->get();
        return view('catalogo', ['Aziende'=>$data], ['nOOfferte'=>$dataNO]);
    }
}
