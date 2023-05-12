<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //
    function index()
    {
        return "API data will be here";
    }

    function getData()
    {
        return User::all();
    }
}
