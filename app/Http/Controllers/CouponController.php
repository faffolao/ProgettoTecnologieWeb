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
        $data = Offer::where('id', $id)->first();
        return view('coupon', ['tuple'=>$data]);
    }

    function getDataLCU(/*$usernameCliente*/)
    {
        $data = Coupon::join('offerte', 'coupons.idOfferta', '=', 'offerte.id')
            ->join('aziende', 'offerte.idAzienda', '=', 'aziende.id')
            ->join('utenti', 'utenti.username', '=', 'coupons.usernameCliente')
            ->orderBy('coupons.dataOraCreazione', 'asc')
            ->select('utenti.username', 'offerte.nome as nomeOfferte', 'aziende.nome as nomeAziende', 'coupons.dataOraCreazione', 'offerte.dataOraScadenza', 'coupons.codice')
            ->get();
        //            ->where('usernameCliente', $usernameCliente)
       // dd($data);
        return view('listaCouponUsati', ['List'=>$data]);
    }

    public function getDataBRCU(Request $request /*, $usernameCliente*/)
    {
        $data = Coupon::all();
        $query = $request->input('query');
        $dataCU = Coupon::join('offerte', 'coupons.idOfferta', '=', 'offerte.id')
            ->join('aziende', 'offerte.idAzienda', '=', 'aziende.id')
            ->join('utenti', 'utenti.username', '=', 'coupons.usernameCliente')
            ->orderBy('coupons.dataOraCreazione', 'asc')
            ->select('utenti.username', 'offerte.nome as nomeOfferte', 'aziende.nome as nomeAziende', 'coupons.dataOraCreazione', 'offerte.dataOraScadenza', 'coupons.codice')
            ->where('offerte.nome', 'LIKE', '%' .$query. '%')
            ->get();
        //            ->where('coupons.usernameCliente', $usernameCliente)
        return view('listaCouponUsati', ['Coupon'=>$data], ['List'=>$dataCU]);
    }

}
