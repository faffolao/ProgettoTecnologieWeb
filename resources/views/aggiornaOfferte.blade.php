@extends('layouts.skel')

@section('content')
    <div class="wrapper wrapper-register">
        <div class="form-box form-box-inputdialog login">
            <h2>Aggiorna Offerte</h2>
            <br>
            <form class="form-insertFAQ" action={{url('/aggiornaOfferte/'.$dati['id'])}} method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-left">
                        <fieldset title="Aggiorna dati offerta">
                            <label for="nome">Aggiorna il nome:</label>
                            <input type="text" id="nome" name="nome" value="{{$dati['nome']}}" required>

                            <label for="oggetto">Aggiorna l'oggetto:</label>
                            <input type="text" id="oggetto" name="oggetto" value="{{$dati['oggetto']}}" required>

                            <label for="idAzienda">Azienda:</label>
                            <p><em>Azienda attuale: {{$dati['idAzienda']}}</em></p>
                            <select id="idAzienda" name="idAzienda" required>
                                @foreach($ListaNomi as $listaNomi)
                                        <option value="{{ $listaNomi['nome'] }}">{{$listaNomi['id']}}: {{ $listaNomi['nome'] }}</option>
                                @endforeach
                            </select>

                            <label for="modalitaFruizione">Modalità di fruizione:</label>
                            <input type="text" id="modalitaFruizione" name="modalitaFruizione" value="{{$dati['modalitaFruizione']}}" required>
                        </fieldset>
                    </div>

                    <div class="form-right">
                        <fieldset title="Inserisci dati offerta">
                            <label for="luogoFruizione">Luogo di fruizione:</label>
                            <input type="text" id="luogoFruizione" name="luogoFruizione" value="{{$dati['luogoFruizione']}}" required>

                            <label for="dataOraScadenza">Data e ora di scadenza:</label>
                            <input type="datetime-local" id="dataOraScadenza" name="dataOraScadenza" value="{{$dati['dataOraScadenza']}}" required>

                            <fieldset title="Carica immagini in formato .png o .jpeg">
                                <label for="logo">Carica l'immagine dell'offerta:</label>
                                <input type="file" id="immagine" name="immagine"
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

