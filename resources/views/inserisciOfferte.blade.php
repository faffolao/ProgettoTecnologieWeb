@extends('layouts.skel')

@section('content')
    <!-- il wrapper è il contenitore -->
    <div class="wrapper">

        <div class="form-box form-box-inputdialog login">
            <h2>Inserisci una nuova offerta</h2>

            <!-- effettiva form di input -->
            {{ Form::open(array('url' => '/inserisciOfferte', 'class' => 'contact-form', 'enctype' => 'multipart/form-data')) }}
            <div class="form-row">
                <div class="form-left">
                    <fieldset title="Inserisci dati offerta">
                        {{ Form::label('nome', 'Nome') }}
                        {{ Form::text('nome', '', ['id' => 'nome', 'required' => 'required']) }}
                        @if ($errors->first('nome'))
                            <ul class="errors">
                                @foreach ($errors->get('nome') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {{ Form::label('oggetto', 'Oggetto') }}
                        {{ Form::text('oggetto', '', ['id' => 'oggetto', 'required' => 'required']) }}
                        @if ($errors->first('oggetto'))
                            <ul class="errors">
                                @foreach ($errors->get('oggetto') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <label title="ATTENZIONE SELEZIONARE QUESTO CAMPO ALMENO UNA VOLTA ALTRIMENTI INSERIRÀ LA PRIMA AZIENDA DISPONIBILE!!!" for="idAzienda">Azienda</label>
                        <select id="idAzienda" name="idAzienda" required>
                            <option value="NULL">seleziona</option>
                            @foreach($ListaNomi as $listaNomi)
                                <option value="{{ $listaNomi['nome'] }}">{{$listaNomi['id']}}: {{ $listaNomi['nome'] }}</option>
                            @endforeach
                        </select>

                        {{ Form::label('modalitaFruizione', 'Modalità di fruizione') }}
                        {{ Form::text('modalitaFruizione', '', ['id' => 'modalitaFruizione', 'required' => 'required']) }}
                        @if ($errors->first('modalitaFruizione'))
                            <ul class="errors">
                                @foreach ($errors->get('modalitaFruizione') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                    </fieldset>
                </div>
                <div class="form-right">
                    <fieldset title="Inserisci dati offerta">
                        {{ Form::label('luogoFruizione', 'Luogo di fruizione') }}
                        {{ Form::text('luogoFruizione', '', ['id' => 'luogoFruizione', 'required' => 'required']) }}
                        @if ($errors->first('luogoFruizione'))
                            <ul class="errors">
                                @foreach ($errors->get('luogoFruizione') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {{ Form::label('dataOraScadenza', 'Data e ora di scadenza') }}
                        {{ Form::datetimeLocal('dataOraScadenza', '',['id' => 'dataOraScadenza', 'rules' => 'date_format:d-m-Y H:mm:ss', 'required' => 'required']) }}
                        @if ($errors->first('dataOraScadenza'))
                            <ul class="errors">
                                @foreach ($errors->get('dataOraScadenza') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <fieldset title="Carica immagini in formato .png o .jpeg">
                        {{ Form::label('immagine','Immagine della offerta' ) }}
                        {{ Form::file('immagine', array('required' => 'required')) }}
                        @if ($errors->first('immagine'))
                            <ul class="errors">
                                @foreach ($errors->get('immagine') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                        </fieldset>
{{--                            <label for="immagine">Inserisci l'immagine dell'Offerta:</label>--}}
{{--                            <input type="file" id="immagine" name="immagine"--}}
{{--                                   accept="image/png, image/jpeg, image/bin, image/jpg" required>--}}

                    </fieldset>
                </div>
            </div>

            {{ Form::submit('Inserisci questa nuova offerta', ['class' => 'btn'])}}
            {{ Form::close() }}
            <br>
            <br>
            <a class="btn btn-back" href="{{ route('gestioneOfferte') }}">Torna indietro</a>
        </div>
        </form>
    </div>
    </div>
@endsection
