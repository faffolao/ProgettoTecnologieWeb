@extends('layouts.skel')

@section('content')
    <div class="wrapper wrapper-register">
        <div class="form-box form-box-inputdialog login">
            <h2>Aggiorna Offerte</h2>
            <br>
            <form class="form-insertFAQ" action={{url('/aggiornaOfferte/'.$dati['id'])}} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-left">
                        <fieldset title="Aggiorna dati offerta">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" value="{{$dati['nome']}}" required>

                            <label for="oggetto">Oggetto:</label>
                            <textarea type="text" id="oggetto" name="oggetto" required>{{$dati['oggetto']}}"</textarea>

                            <label for="idAzienda">Azienda:</label>
                            <p><em>Azienda attuale: {{$dati['idAzienda']}}</em></p>
                            <select id="idAzienda" name="idAzienda" required>
                                <option value="NULL">seleziona</option>
                                @foreach($ListaNomi as $listaNomi)
                                    <option value="{{ $listaNomi['id'] }}">{{$listaNomi['id']}}: {{ $listaNomi['nome'] }}</option>
                                @endforeach
                            </select>

                            <label for="modalitaFruizione">Modalità di fruizione:</label>
                            <textarea type="text" id="modalitaFruizione" name="modalitaFruizione" required>{{$dati['modalitaFruizione']}}</textarea>
                        </fieldset>
                    </div>

                    <div class="form-right">
                        <fieldset title="Inserisci dati offerta">
                            <label for="luogoFruizione">Luogo di fruizione:</label>
                            <textarea type="text" id="luogoFruizione" name="luogoFruizione" required>{{$dati['luogoFruizione']}}</textarea>
                            <fieldset title="Aggiorna data e ora!">
                                <label for="dataOraScadenza">Data e ora di scadenza:</label>
                                <input type="datetime-local" id="dataOraScadenza" name="dataOraScadenza" value="{{$dati['dataOraScadenza']}}" required>
                            </fieldset>

                            <fieldset title="Carica immagini in formato .png o .jpeg">
                                <label for="logo">Aggiorna l'immagine dell'Offerta:</label>
                                <p style="margin-bottom: 5px;"><em>Immagine attualmete selezionata:</em></p>
                                <img src="data:image/png/jpg/webp/jpeg/bin;base64,{{ base64_encode($dati['immagine']) }}" style="max-height: 40%;max-width: 40%;" alt="Immagine Offerta">
                                <input type="file" id="immagine" name="immagine"
                                       accept="image/png, image/jpeg, image/bin, image/jpg">
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

