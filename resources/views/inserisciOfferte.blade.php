@extends('layouts.skel')

@section('content')
    <!-- il wrapper è il contenitore -->
    <div class="wrapper wrapper-register">

        <div class="form-box form-box-inputdialog login">
            <h2>Inserisci una nuova offerta</h2>

            <!-- effettiva form di input -->
            <form class="form-insertFAQ" action={{url('/inserisciOfferte')}} method="POST" enctype="multipart/form-data">
{{--            {{ Form::open(array('url' => '/inserisciOfferte', 'class' => 'contact-form', 'enctype' => 'multipart/form-data')) }}--}}
                @csrf
                <div class="form-row">
                    <div class="form-left">
                        <fieldset title="Inserisci dati offerta">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" required>

                            <label for="oggetto">Oggetto:</label>
                            <textarea type="text" id="oggetto" name="oggetto" required></textarea>

                            <label title="ATTENZIONE SELEZIONARE QUESTO CAMPO ALMENO UNA VOLTA ALTRIMENTI INSERIRÀ LA PRIMA AZIENDA DISPONIBILE!!!" for="idAzienda">Azienda:</label>
                            <select id="idAzienda" name="idAzienda" required>
                                <option value="NULL">seleziona</option>
                                @foreach($ListaNomi as $listaNomi)
                                    <option value="{{ $listaNomi['id'] }}">{{$listaNomi['id']}}: {{ $listaNomi['nome'] }}</option>
                                @endforeach
                            </select>

                            <label for="modalitaFruizione">Modalità di fruizione:</label>
                            <textarea type="text" id="modalitaFruizione" name="modalitaFruizione" required></textarea>
                        </fieldset>
                    </div>
                    <div class="form-right">
                        <fieldset title="Inserisci dati offerta">
                            <label for="luogoFruizione">Luogo di fruizione:</label>
                            <textarea type="text" id="luogoFruizione" name="luogoFruizione" required></textarea>

                            <fieldset title="Inserisci data e ora!">
                                <label for="dataOraScadenza">Data e ora di scadenza:</label>
                                <input type="datetime-local" id="dataOraScadenza" name="dataOraScadenza" required>
                            </fieldset>


                            <fieldset title="Carica immagini in formato .png o .jpeg">
                                <label for="immagine">Inserisci l'immagine dell'Offerta:</label>
                                <input type="file" id="immagine" name="immagine"
                                       accept="image/png, image/jpeg, image/bin, image/jpg" required>
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
