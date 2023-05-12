<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;
use App\Models\Factory;

class FactoryController extends Controller
{
    //
        function getData()
    {
        return Factory::all();
    }
}
