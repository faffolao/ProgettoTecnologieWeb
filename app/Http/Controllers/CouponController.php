<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    //
        function getData()
    {
        return Coupon::all();
    }
    function getDataNO($id)
    {
        $data= Offer::where('id', $id)->first();
        return view('coupon', ['tuple'=>$data]);
    }

}
