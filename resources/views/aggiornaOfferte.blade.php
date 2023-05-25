@extends('layouts.skel')

@section('content')
    <div class="wrapper">
        <div class="form-box form-box-inputdialog login">
            <h2>Aggiorna Offerte</h2>
            <br>
            {{ Form::open(array('url' => '/aggiornaOfferte/'.$dati['id'], 'class' => 'contact-form', 'method'=>'PUT', 'enctype' => 'multipart/form-data')) }}
            @csrf
            {{--            <form class="form-insertFAQ" action={{url('/aggiornaOfferte/'.$dati['id'])}} method="POST" enctype="multipart/form-data">--}}
            {{--                @method('PUT')--}}
            <div class="form-row">
                <div class="form-left">
                    <fieldset title="Aggiorna dati offerta">
                        {{ Form::label('nome', 'Nome', ['class' => 'label-input']) }}
                        {{ Form::text('nome', $dati['nome'], ['class' => 'input', 'id' => 'nome', 'required' => 'required']) }}
                        @if ($errors->first('nome'))
                            <ul class="errors">
                                @foreach ($errors->get('nome') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {{--                            <label for="nome">Nome:</label>--}}
                        {{--                            <input type="text" id="nome" name="nome" value="{{$dati['nome']}}" required>--}}

                        {{ Form::label('oggettto', 'Oggetto', ['class' => 'label-input']) }}
                        {{ Form::text('oggetto', $dati['oggetto'], ['class' => 'input', 'id' => 'oggetto', 'required' => 'required']) }}
                        @if ($errors->first('oggetto'))
                            <ul class="errors">
                                @foreach ($errors->get('oggetto') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {{--                            <label for="oggetto">Oggetto:</label>--}}
                        {{--                            <textarea type="text" id="oggetto" name="oggetto" required>{{$dati['oggetto']}}</textarea>--}}


                        <label for="idAzienda">Azienda:</label>
                        <p><em>Azienda attuale: {{$dati['idAzienda']}}</em></p>
                        <select id="idAzienda" name="idAzienda" required>
                            <option value="NULL">seleziona</option>
                            @foreach($ListaNomi as $listaNomi)
                                <option value="{{ $listaNomi['id'] }}">{{$listaNomi['id']}}: {{ $listaNomi['nome'] }}</option>
                            @endforeach
                        </select>

                        {{ Form::label('modalitaFruizione', 'Modalità di fruizione', ['class' => 'label-input']) }}
                        {{ Form::text('modalitaFruizione', $dati['modalitaFruizione'], ['class' => 'input', 'id' => 'modalitaFruizione', 'required' => 'required']) }}
                        @if ($errors->first('modalitaFruizione'))
                            <ul class="errors">
                                @foreach ($errors->get('modalitaFruizione') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                        {{--                            <label for="modalitaFruizione">Modalità di fruizione:</label>--}}
                        {{--                            <textarea type="text" id="modalitaFruizione" name="modalitaFruizione" required>{{$dati['modalitaFruizione']}}</textarea>--}}
                    </fieldset>
                </div>

                <div class="form-right">
                    <fieldset title="Inserisci dati offerta">
                        {{ Form::label('luogoFruizione', 'Luogo di fruizione', ['class' => 'label-input']) }}
                        {{ Form::text('luogoFruizione', $dati['luogoFruizione'], ['class' => 'input', 'id' => 'luogoFruizione', 'required' => 'required']) }}
                        @if ($errors->first('luogoFruizione'))
                            <ul class="errors">
                                @foreach ($errors->get('luogoFruizione') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {{--                            <label for="luogoFruizione">Luogo di fruizione:</label>--}}
                        {{--                            <textarea type="text" id="luogoFruizione" name="luogoFruizione" required>{{$dati['luogoFruizione']}}</textarea>--}}

                        {{ Form::label('dataOraScadenza', 'Data e ora di scadenza', ['class' => 'label-input']) }}
                        {{ Form::datetimeLocal('dataOraScadenza', $dati['dataOraScadenza'] ,['class' => 'input', 'id' => 'dataOraScadenza', 'rules' => 'date_format:d-m-Y H:mm:ss', 'required' => 'required']) }}
                        @if ($errors->first('dataOraScadenza'))
                            <ul class="errors">
                                @foreach ($errors->get('dataOraScadenza') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                        {{--                            --}}
                        {{--                            <fieldset title="Aggiorna data e ora!">--}}
                        {{--                                <label for="dataOraScadenza">Data e ora di scadenza:</label>--}}
                        {{--                                <input type="datetime-local" id="dataOraScadenza" name="dataOraScadenza" value="{{$dati['dataOraScadenza']}}" required>--}}
                        {{--                            </fieldset>--}}

                        <fieldset title="Carica immagini in formato .png o .jpeg">
                            {{ Form::label('immagine','Immagine della offerta', ['class' => 'label-input']) }}
                            <p><em>Immagine attualmete selezionata:</em></p>
                            <img src="data:image/png/jpg/webp/jpeg/bin;base64,{{ base64_encode($dati['immagine']) }}" class="form-image-input-preview" alt="Immagine Offerta">
                            {{ Form::file('immagine') }}
                            @if ($errors->first('immagine'))
                                <ul class="errors">
                                    @foreach ($errors->get('immagine') as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </fieldset>

                        {{--                            <fieldset title="Carica immagini in formato .png o .jpeg">--}}
                        {{--                                <label for="logo">Aggiorna l'immagine dell'Offerta:</label>--}}
                        {{--                                <p><em>Immagine attualmete selezionata:</em></p>--}}
                        {{--                                <img src="data:image/png/jpg/webp/jpeg/bin;base64,{{ base64_encode($dati['immagine']) }}" class="form-image-input-preview" alt="Immagine Offerta">--}}
                        {{--                                <input type="file" id="immagine" name="immagine"--}}
                        {{--                                       accept="image/png, image/jpeg, image/bin, image/jpg">--}}
                        {{--                            </fieldset>--}}
                    </fieldset>
                </div>
            </div>

            {{ Form::submit('Aggiorna offerta', ['class' => 'btn'])}}
            {{ Form::close() }}
            <div class="panel-buttons">
                <a class="btn btn-back" href="{{ route('gestioneOfferte') }}">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection

