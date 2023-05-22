<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    //Ardu sappi che le query non vanno
    function getData()
    {
        $count = Coupon::count();
//        $clienti = User::where('livello', 1)->get();
        $risultatiClienti = Coupon::select('usernameCliente', DB::raw('COUNT(*) as conteggioC'))
            ->groupBy('usernameCliente')
            ->get();
        $risultatiOfferte = Coupon::select('idOfferta', DB::raw('COUNT(*) as conteggioO'))
            ->groupBy('idOfferta')
            ->get();
        $nomiOfferte = Offer::where('id', $risultatiOfferte['idOfferta'])->get();

        return view('statistiche', [['coupon'=>$count], ['Clienti'=>$risultatiClienti],
            ['Offerte'=>$risultatiOfferte], ['nomiOfferte'=>$nomiOfferte]]);
    }
    public function getDataBRS(Request $request)
    {
        $count = Coupon::count();
        if ($request['tipoRicerca']=="username")
        {
            $query = $request->input('query');
            $dataUN = Coupon::where('usernameCliente', 'LIKE', '%' .$query. '%')
                ->groupBy('usernameCliente')
                ->get();

            $risultatiOfferte = Coupon::select('idOfferta', DB::raw('COUNT(*) as conteggioO'))
                ->groupBy('idOfferta')
                ->get();
            $nomiOfferte = Offer::where('id', $risultatiOfferte['idOfferta'])->get();

            return view('statistiche', [['coupon'=>$count], ['Clienti'=>$dataUN],
                ['Offerte'=>$risultatiOfferte], ['nomiOfferte'=>$nomiOfferte]]);
        } elseif ($request['tipoRicerca']=="offerta")
        {
            $query = $request->input('query');
            $nomeOfferta = Offer::where('nome',  'LIKE', '%' .$query. '%')->get();
            $dataO = Coupon::where('idOfferta', $nomeOfferta['id'])
                ->groupBy('idOfferta')
                ->get();
            $nomiOfferte = Offer::where('id', $dataO['idOfferta'])->get();

            $risultatiClienti = Coupon::select('usernameCliente', DB::raw('COUNT(*) as conteggioC'))
                ->groupBy('usernameCliente')
                ->get();

            return view('statistiche', [['coupon'=>$count], ['Clienti'=>$risultatiClienti],
                ['Offerte'=>$dataO], ['nomiOfferte'=>$nomiOfferte]]);
        } else
        {
            $risultatiClienti = Coupon::select('usernameCliente', DB::raw('COUNT(*) as conteggioC'))
                ->groupBy('usernameCliente')
                ->get();
            $risultatiOfferte = Coupon::select('idOfferta', DB::raw('COUNT(*) as conteggioO'))
                ->groupBy('idOfferta')
                ->get();
            $nomiOfferte = Offer::where('id', $risultatiOfferte['idOfferta'])->get();

            return view('statistiche', [['coupon'=>$count], ['Clienti'=>$risultatiClienti],
                ['Offerte'=>$risultatiOfferte], ['nomiOfferte'=>$nomiOfferte]]);
        }
    }
}
