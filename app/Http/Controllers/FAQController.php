<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
    //
        function getData()
    {
        return FAQ::all();
    }
}
