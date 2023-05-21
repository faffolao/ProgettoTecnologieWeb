@extends('layouts.skel')

@section('content')
    <!-- il wrapper è il contenitore che contiene il box della form di login -->
    <div class="wrapper wrapper-register">
        <!-- box che contiene la form di login -->
        <div class="form-box form-box-inputdialog login">
            <h2>Inserisci una nuova offerta</h2>

            <!-- effettiva form di input -->
            <form class="form-insertFAQ" action="/inserisciOfferte" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-left">
                        <fieldset title="Inserisci dati offerta">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" required>

                            <label for="oggetto">Oggetto:</label>
                            <input type="text" id="oggetto" name="oggetto" required>

                            <label for="idAzienda">Azienda:</label>
                            <select id="idAzienda" name="idAzienda" required>
                                @foreach($ListaNomi as $listaNomi)
                                    <option value="{{ $listaNomi['nome'] }}">{{ $listaNomi['nome'] }}</option>
                                @endforeach
                            </select>

                            <label for="modalitaFruizione">Modalità di fruizione:</label>
                            <input type="text" id="modalitaFruizione" name="modalitaFruizione" required>
                        </fieldset>
                    </div>
                    <div class="form-right">
                        <fieldset title="Inserisci dati offerta">
                            <label for="luogoFruizione">Luogo di fruizione:</label>
                            <input type="text" id="luogoFruizione" name="luogoFruizione" required>

                            <label for="dataOraScadenza">Data e ora di scadenza:</label>
                            <input type="date" id="dataOraScadenza" name="dataOraScadenza" required>

                            <fieldset title="Carica immagini in formato .png o .jpeg">
                                <label for="immagine">Carica l'immagine dell'offerta:</label>
                                <input type="file" id="immagine" name="immagine"
                                       accept="image/png, image/jpeg" required>
                            </fieldset>
                        </fieldset>
                    </div>
                </div>

                <div style="clear:both;"></div>

                <button type="submit" class="btn">Inserisci Offerta</button>
                <div class="panel-buttons">
                    <a class="btn btn-back" href="{{ route('gestioneOfferte') }}">Torna indietro</a>
                </div>
            </form>
        </div>
    </div>
@endsection
