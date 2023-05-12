<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    //
        function getData()
    {
        return Coupon::all();
    }
}
