@extends('layouts.skel')

@section('title', 'Modifica FAQ')

@section('content')
    @if(isset($dati))
    <div class="container">
        <div class="panel">
            <h2>Aggiorna F.A.Q.</h2>
            <br>

            {{ Form::open(array('url' => '/aggiornaFAQ/'.$dati['id'], 'class' => 'form-insertFAQ', 'enctype' => 'multipart/form-data', 'method' => 'PUT')) }}
            @csrf
            {{ Form::label('domanda', 'Domanda') }}
            {{ Form::text('domanda', $dati['domanda'], ['class' => 'input', 'id' => 'domanda', 'required' => 'required', 'placeholder' => 'Domanda...']) }}
            @if ($errors->first('domanda'))
                <ul class="errors">
                    @foreach ($errors->get('domanda') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif

            {{ Form::label('risposta', 'Risposta') }}
            {{ Form::textArea('risposta', $dati['risposta'], ['class' => 'input', 'id' => 'risposta', 'required' => 'required', 'placeholder' => 'Risposta...']) }}
            @if ($errors->first('risposta'))
                <ul class="errors">
                    @foreach ($errors->get('risposta') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif

            {{ Form::submit('Aggiungi domanda e risposta', ['class' => 'btn'])}}
            {{ Form::close() }}

            <div class="panel-buttons">
                <a class="btn btn-back" href="{{ route('gestioneFAQ') }}">Torna indietro</a>
            </div>
        </div>
    </div>
    @endif
@endsection
