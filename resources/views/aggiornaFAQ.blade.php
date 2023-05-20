@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <h2>Aggiorna F.A.Q.</h2>
            <br>
            <form class="form-insertFAQ" action={{url('/aggiornaFAQ/'.$dati['id'])}} method="POST">
                @csrf
                @method('PUT')
                <label for="domanda">Aggiorna la domanda:</label>
                <input type="text" id="domanda" name="domanda" value="{{$dati['domanda']}}" required>
                <label for="risposta">Aggiorna la risposta:</label>
                <textarea type="text" id="risposta" name="risposta" required>{{$dati['risposta']}}</textarea>
                <button class="btn" type="submit">Aggiorna domanda e risposta</button>
            </form>
            <div class="panel-buttons">
                <a class="btn btn-back" href="{{ route('gestioneFAQ') }}">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection
