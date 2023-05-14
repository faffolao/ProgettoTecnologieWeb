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
        $data= Offer::where('id', $id)->first();
        return view('dettagliOfferta', ['tuple'=>$data]);
    }
}
