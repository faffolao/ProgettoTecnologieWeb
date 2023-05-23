<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Factory;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    function getData()
    {
        // ottengo tutte le offerte
        $promo = Offer::select('id', 'nome')->get();

        // ottengo gli utenti di livello 1, che sono i clienti
        $clienti = User::select('username', 'nome', 'cognome')->where('livello', 1)->get();

        // ottengo il numero di coupon totali che sono stati generati
        $couponNum = Coupon::count();

        // ritorno la view con tutti i dati che servono
        return view("statistiche", ["Promo" => $promo, "Clienti" => $clienti, "NumeroCoupon" => $couponNum]);
    }

    function getOffertaCoupons(Request $request) {
        // ottengo l'id dell'offerta a partire dai parametri arrivati in POST
        $idOfferta = $request->input("idOfferta");

        // ottengo il nome dell'offerta selezionata
        // NOTA: uso first() per prendere soltanto un elemento, in modo tale che ricevo subito un oggetto senza dover
        // prima accedere all'array
        $offer = Offer::select('nome')->where('id', $idOfferta)->first();

        // ottengo il numero di coupon generati da questa offerta
        $couponNumber = Coupon::join('offerte', 'coupons.idOfferta', '=', 'offerte.id')
                                ->where('idOfferta', $idOfferta)
                                ->count();

        // restituisco questi dati come risposta in formato JSON
        return response()->json(['offerName' => $offer->nome, 'couponNumber' => $couponNumber]);
    }

    function getClienteCoupons(Request $request) {
        // ottengo lo username a partire dai parametri arrivati in POST
        $username = $request->input("username");

        // ottengo il numero di coupon che il cliente ha richiesto
        $couponNumber = Coupon::join('utenti', 'coupons.usernameCliente', '=', 'utenti.username')
                                ->where('livello', 1)
                                ->where('username', $username)
                                ->count();

        // restituisco questi dati come risposta in formato JSON
        return response()->json(['username' => $username, 'couponNumber' => $couponNumber]);
    }
}
