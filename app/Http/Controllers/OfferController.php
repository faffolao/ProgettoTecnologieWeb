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
}
