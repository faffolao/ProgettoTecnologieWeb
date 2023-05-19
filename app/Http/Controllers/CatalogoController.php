<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

define("NUM_PAGES", 9);

class CatalogoController extends Controller
{
    // BR = Barra Ricerca
    public function getDataBR(Request $request)
    {
        $dbQuery = Offer::query();
        $viewData = Array();

        $factoryQuery = $request->input("factory_query");
        $offerQuery = $request->input("offer_query");

        if ($factoryQuery != null)
        {
            $dbQuery->join("aziende", "offerte.idAzienda", "=", "aziende.id")
                    ->where("aziende.nome", "LIKE", "%" . $factoryQuery . "%");

            $viewData['FactoryQuery'] = $factoryQuery;
        }

        if ($offerQuery != null)
        {
            // NOTA - uso questa notazione per l'espressione WHERE perchè ho bisogno di metterla all'interno di parentesi
            // tonde, per evitare problemi con la query
            // Output finale: SELECT * FROM Offerte WHERE (nome LIKE %% OR oggetto LIKE %%);
            $dbQuery = $dbQuery->where(function($dbQuery) use ($offerQuery) {
                $dbQuery->where('offerte.nome', 'LIKE', '%' . $offerQuery . '%')
                    ->orWhere('offerte.oggetto', 'LIKE', '%' . $offerQuery . '%');
            });

            $viewData["OfferQuery"] = $offerQuery;
        }

        $offerList = $dbQuery->paginate(NUM_PAGES);
        $viewData["Offerte"] = $offerList;

        return view("catalogo", $viewData);
    }
}
