<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    //
    function getData()
    {
        return Coupon::all();
    }
    function getDataOC($idOfferta, $usernameCliente)
    {
        $dataCP = Coupon::where('idOfferta', $idOfferta)
            ->where('usernameCliente', $usernameCliente)
            ->first();
        $dataO = Offer::where('id', $idOfferta)->first();
        $dataC = User::where('username', $usernameCliente)->first();
        return view('coupon', ['tuple'=>$dataO, 'cliente'=>$dataC, 'datiCoupon'=>$dataCP]);
    }

    function saveDataC($idOfferta, $usernameCliente)
    {
        if(!Coupon::where('idOfferta', $idOfferta)
            ->where('usernameCliente', $usernameCliente)
            ->exists()) {
            // Genera il codice alfanumerico controllando
            // che non venga ripetuto
            do {
                $codice = Str::random(9);
            } while (Coupon::where('codice', $codice)->exists());

            $coupon = new Coupon();
            $coupon['idOfferta'] = $idOfferta;
            $coupon['usernameCliente'] = $usernameCliente;
            $coupon['codice'] = $codice;
            $coupon->save();

        }
        $dataO = Offer::where('id', $idOfferta)->first();
        $dataC = User::where('username', $usernameCliente)->first();
        $dataCP = Coupon::where('idOfferta', $idOfferta)
            ->where('usernameCliente', $usernameCliente)
            ->first();
        return view('coupon', ['tuple'=>$dataO, 'cliente'=>$dataC, 'datiCoupon'=>$dataCP]);
    }

    //Per mostrare la lista di coupons usati
    function getDataLCU($usernameCliente)
    {
        $data = Coupon::join('offerte', 'coupons.idOfferta', '=', 'offerte.id')
            ->join('aziende', 'offerte.idAzienda', '=', 'aziende.id')
            ->join('utenti', 'utenti.username', '=', 'coupons.usernameCliente')
            ->orderBy('coupons.dataOraCreazione', 'asc')
            ->select('utenti.username', 'offerte.id as idOfferte', 'offerte.nome as nomeOfferte', 'aziende.nome as nomeAziende', 'coupons.dataOraCreazione', 'offerte.dataOraScadenza', 'coupons.codice')
            ->where('coupons.usernameCliente', $usernameCliente)
            ->get();
        //            ->where('usernameCliente', $usernameCliente)
        // dd($data);
        return view('listaCouponUsati', ['List'=>$data]);
    }

    // Metodo per la barra di ricerca per view listaCouponUsati
    public function getDataBRCU(Request $request , $usernameCliente)
    {
        $data = Coupon::all();
        $query = $request->input('query');
        $dataCU = Coupon::join('offerte', 'coupons.idOfferta', '=', 'offerte.id')
            ->join('aziende', 'offerte.idAzienda', '=', 'aziende.id')
            ->join('utenti', 'utenti.username', '=', 'coupons.usernameCliente')
            ->orderBy('coupons.dataOraCreazione', 'asc')
            ->select('utenti.username', 'offerte.id as idOfferte', 'offerte.nome as nomeOfferte', 'aziende.nome as nomeAziende', 'coupons.dataOraCreazione', 'offerte.dataOraScadenza', 'coupons.codice')
            ->where('offerte.nome', 'LIKE', '%' .$query. '%')
            ->where('coupons.usernameCliente', $usernameCliente)
            ->get();

        return view('listaCouponUsati', ['Coupon'=>$data], ['List'=>$dataCU]);
    }
}
