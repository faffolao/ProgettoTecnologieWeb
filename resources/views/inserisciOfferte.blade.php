@extends('layouts.skel')

@section('content')
    <!-- il wrapper è il contenitore -->
    <div class="wrapper wrapper-register">

        <div class="form-box form-box-inputdialog login">
            <h2>Inserisci una nuova offerta</h2>

            <!-- effettiva form di input -->
            {{ Form::open(array('url' => '/inserisciOfferte', 'class' => 'contact-form', 'enctype' => 'multipart/form-data')) }}
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
                            <input type="datetime-local" id="dataOraScadenza" name="dataOraScadenza" required>

                            {{ Form::label('immagine','Immagine di questa Offerta' ) }}
                            {{ Form::file('immagine') }}
                            @if ($errors->first('immagine'))
                                <ul class="errors">
                                    @foreach ($errors->get('immagine') as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif
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
