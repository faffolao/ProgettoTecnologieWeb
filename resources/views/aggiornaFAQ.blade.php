@extends('layouts.skel')

@section('content')
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

            {{--            <form class="form-insertFAQ" action={{url('/aggiornaFAQ/'.$dati['id'])}} method="POST">--}}
            {{--                @csrf--}}
            {{--                @method('PUT')--}}
            {{--                <label for="domanda">Aggiorna la domanda:</label>--}}
            {{--                <input type="text" id="domanda" name="domanda" value="{{$dati['domanda']}}" required>--}}
            {{--                <label for="risposta">Aggiorna la risposta:</label>--}}
            {{--                <textarea type="text" id="risposta" name="risposta" required>{{$dati['risposta']}}</textarea>--}}
            {{--                <button class="btn" type="submit">Aggiorna domanda e risposta</button>--}}
            {{--            </form>--}}
            <div class="panel-buttons">
                <a class="btn btn-back" href="{{ route('gestioneFAQ') }}">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection
