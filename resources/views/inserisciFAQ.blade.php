@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <h2>Inserisci F.A.Q.</h2>
            <br>
            <form class="form-insertFAQ" action="/inserisciFAQ" method="POST">
                @csrf
                <label for="domanda">Inserisci la domanda:</label>
                <input type="text" id="domanda" name="domanda" placeholder="Domanda..." required>
                <label for="risposta">Inserisci la risposta:</label>
                <textarea type="text" id="risposta" name="risposta" placeholder="Risposta..." required></textarea>
                <button class="btn" type="submit">Aggiungi domanda e risposta</button>
            </form>
            <div class="panel-buttons">
                <a class="btn btn-back" href="{{ route('modificaFAQ') }}">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection
