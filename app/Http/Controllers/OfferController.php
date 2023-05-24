<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    //
    function getData()
    {
        return Offer::all();
    }
    function getDataDO($id)
    {
        $data = Offer::where('id', $id)->first();
        return view('dettagliOfferta', ['tuple'=>$data]);
    }

    function getDataOff()
    {
        $data = Offer::all();
        return view('gestioneOfferte', ['List'=>$data]);
    }

    public function getDataBRGO(Request $request)
    {
        $data = Offer::all();
        $query = $request->input('query');
        $dataNO = Offer::where('nome', 'LIKE', '%' .$query. '%')->get();
        return view('gestioneOfferte', ['Offerta'=>$data], ['List'=>$dataNO]);
    }

    function deleteR($id)
    {
        // Trova la riga nel database
        $row = Offer::findOrFail($id);

        // Elimina la riga
        $row->delete();

        // Esempio di reindirizzamento alla pagina principale
        return redirect()->route('gestioneOfferte')->with('message', 'Offerta eliminata con successo.');
    }
    function addOff(Request $request){

        //Controlla se i campi sono stati compilati correttamente
        $request->validate([
            'nome' => ['required','string','max:70', 'unique:offerte']
        ]);

        $off = new Offer();
        $root = "root";
        if ($request->input('idAzienda')=="NULL")
        {
            $azienda = Factory::first();
        } else
        {
            $nomeA = $request->input('idAzienda');
            $azienda = Factory::where('nome', $nomeA)->first();
        }
        $off['idAzienda'] = $azienda['id'];
        $off['nome'] = $request->input('nome');
        $off['oggetto'] = $request->input('oggetto');
        $off['modalitaFruizione'] = $request->input('modalitaFruizione');
        $off['dataOraScadenza'] = $request->input('dataOraScadenza');
        $off['luogoFruizione'] = $request->input('luogoFruizione');
        $img = $request->file('immagine');
        $immagine = file_get_contents($img);
        $off['immagine'] = $immagine;
        $off->save();

        return redirect()->route('gestioneOfferte');
    }

    function getNomeAziende()
    {
        $data = Factory::orderBy('id', 'asc')->get();
        return view('inserisciOfferte', ['ListaNomi'=>$data]);
    }

    function getDataSingleOff($id){
        $dataAziende = Factory::orderBy('id' , 'asc')->get();
        $data = Offer::where('id', $id)->first();
        return view('aggiornaOfferte', ['dati'=>$data], ['ListaNomi'=>$dataAziende]);
    }

    function updateDataSingleOff(Request $request, $id)
    {
        //Controlla se i campi sono stati compilati correttamente
        $request->validate([
            'nome' => ['required','string','max:70', 'unique:offerte']
        ]);

        if (!$request->file('immagine'))
        {
            if ($request->input('idAzienda')=="NULL")
            {
                Offer::where('id', $id)->update(
                    [
                        'nome'=>$request->input('nome'),
                        'oggetto'=>$request->input('oggetto'),
                        'modalitaFruizione'=>$request->input('modalitaFruizione'),
                        'luogoFruizione'=>$request->input('luogoFruizione'),
                        'dataOraScadenza'=>$request->input('dataOraScadenza')
                    ]);
            } else {
                Offer::where('id', $id)->update(
                    [
                        'idAzienda' => $request->input('idAzienda'),
                        'nome'=>$request->input('nome'),
                        'oggetto'=>$request->input('oggetto'),
                        'modalitaFruizione'=>$request->input('modalitaFruizione'),
                        'luogoFruizione'=>$request->input('luogoFruizione'),
                        'dataOraScadenza'=>$request->input('dataOraScadenza')
                    ]);
            }
        } else
        {
            $img = $request->file('immagine');
            $immagine = file_get_contents($img);
            if ($request->input('idAzienda')=="NULL")
            {
                Offer::where('id', $id)->update(
                    [
                        'nome'=>$request->input('nome'),
                        'oggetto'=>$request->input('oggetto'),
                        'modalitaFruizione'=>$request->input('modalitaFruizione'),
                        'luogoFruizione'=>$request->input('luogoFruizione'),
                        'dataOraScadenza'=>$request->input('dataOraScadenza'),
                        'immagine'=>$immagine
                    ]);
            } else
            {
                Offer::where('id', $id)->update(
                    [
                        'idAzienda'=>$request->input('idAzienda'),
                        'nome'=>$request->input('nome'),
                        'oggetto'=>$request->input('oggetto'),
                        'modalitaFruizione'=>$request->input('modalitaFruizione'),
                        'luogoFruizione'=>$request->input('luogoFruizione'),
                        'dataOraScadenza'=>$request->input('dataOraScadenza'),
                        'immagine'=>$immagine
                    ]);
            }
        }
        return redirect()->route('gestioneOfferte');
    }
}
