@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="ins-off ins-off-inputdialog">
            <h2>Aggiorna Azienda</h2>
            <br>
            <form class="form-insertFAQ" action={{url('/aggiornaAzienda/'.$dati['id'])}} method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-left">
                        <fieldset title="Aggiorna i dati dell'azienda">
                            <label for="nome">Aggiorna il nome:</label>
                            <input type="text" id="nome" name="nome" value="{{$dati['nome']}}" required>

                            <label for="descrizione">Descrizione:</label>
                            <input type="text" id="descrizione" name="descrizione" value="{{$dati['descrizione']}}" required>

                            <label for="ragioneSociale">Ragione Sociale:</label>
                            <input type="text" id="ragioneSociale" name="ragioneSociale" value="{{$dati['ragioneSociale']}}" required>
                        </fieldset>
                    </div>

                    <div class="form-right">
                        <fieldset title="Inserisci dati offerta">
                            <label for="tipologia">Tipologia:</label>
                            <input type="text" id="tipologia" name="tipologia" value="{{$dati['tipologia']}}" required>

                            <label for="dataOraScadenza">Data e ora di scadenza:</label>
                            <input type="date" id="dataOraScadenza" name="dataOraScadenza" value="{{$dati['dataOraScadenza']}}" required>

                            <fieldset title="Carica immagini in formato .png o .jpeg">
                                <label for="logo">Carica l'immagine dell'offerta:</label>
                                <input type="file" id="logo" name="logo"
                                       accept="image/png, image/jpeg" value="{{$dati['immagine']}}" required>
                            </fieldset>
                        </fieldset>
                    </div>
                </div>

                <button class="btn" type="submit">Aggiorna l'offerta</button>
            </form>
            <div class="panel-buttons">
                <a class="btn btn-back" href="{{ route('gestioneOfferte') }}">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection

