<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use App\Models\Offer;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    // ottiene le offerte appartenenti all'azienda selezionata
    public function index($idAzienda)
    {
        // ottengo tutte le aziende
        $data = Factory::all();
        // ottengo il nome dell'azienda selezionata
        $aziendaSelezionata = Factory::select('id', 'nome')->where('id', $idAzienda)->first();

        // ottengo le offerte dell'id azienda passata in input
        $dataOff = Offer::where('idAzienda', $idAzienda)->get();

        // ritorno la view contenente la lista delle aziende e le offerte di un'azienda
        return view('catalogo', ['Aziende' => $data, 'Offerte' => $dataOff, 'AziendaSelezionata' => $aziendaSelezionata]);
    }
    public function getDataBR(Request $request)
    {
        // questo è l'array dei dati che dovrò passare alla view
        $viewData = Array();

        // ottengo la lista di aziende
        $factoryList = Factory::all();
        $viewData['Aziende'] = $factoryList;

        // la query di ricerca è contenuta all'interno della richiesta
        $query = $request->input('query');
        $viewData['searchQuery'] = $query;

        // questa è la query di base da inviare al db, che ottiene l'elenco di offerte che contengono all'interno del
        // titolo o della descrizione la query
        // NOTA - uso questa notazione per l'espressione WHERE perchè ho bisogno di metterla all'interno di parentesi
        // tonde, per evitare problemi con la query
        // Output finale: SELECT * FROM Offerte WHERE (nome LIKE %% OR oggetto LIKE %%);
        $dbQuery = Offer::where(function($dbQuery) use ($query) {
            $dbQuery->where('nome', 'LIKE', '%' .$query. '%')
                ->orWhere('oggetto', 'LIKE', '%' .$query. '%');
        });

        // se in passato ho selezionato una specifica azienda, quindi intendo fare una ricerca anche in base all'azienda
        // (voglio quindi offerte che abbiano nel loro titolo/descrizione una parola E che siano di una certa azienda)
        // vado ad aggiungere alla query il filtro in base all'id dell'azienda che è stata selezionata
        if ($request->has('factoryId')) {
            $idAzienda = $request->input("factoryId");
            $aziendaSelezionata = Factory::select('id', 'nome')->where('id', $idAzienda)->first();
            $viewData['AziendaSelezionata'] = $aziendaSelezionata;

            $dbQuery = $dbQuery->where('idAzienda', $idAzienda);
        }

        // eseguo la query
        $offerList = $dbQuery->get();
        $viewData['Offerte'] = $offerList;

        // ritorno la view contenenente tutti i dati collezionati
        return view('catalogo', $viewData);
    }
}
