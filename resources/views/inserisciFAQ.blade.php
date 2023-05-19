@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <h2>Inserisci F.A.Q.</h2>
            <form class="form-insertFAQ" action="/inserisciFAQ" method="POST">
                @csrf
                <label for="domanda">Inserisci la domanda:</label>
                <input type="text" id="domanda" name="domanda" placeholder="Domanda...">
                <label for="risposta">Inserisci la risposta:</label>
                <textarea type="text" id="risposta" name="risposta" placeholder="Risposta..."></textarea>
                <button class="btn" type="submit">Aggiungi domanda e risposta</button>
            </form>
            <div class="panel-buttons">
                <a class="btn btn-back" href="{{ route('modificaFAQ') }}">Torna indietro</a>
            </div>
        </div>
    </div>
    {{--    <div id="form-aggiunta">--}}
    {{--        <h1>Aggiungi domande e risposte nelle FAQ</h1>--}}
    {{--        <form>--}}
    {{--            <label for="domanda">Inserisci la domanda:</label>--}}
    {{--            <input type="text" id="domanda" name="domanda">--}}
    {{--            <label for="risposta">Inserisci la risposta:</label>--}}
    {{--            <textarea id="risposta" name="risposta"></textarea>--}}
    {{--            <button type="button" onclick="aggiungiDomanda()">Aggiungi domanda e risposta</button>--}}
    {{--        </form>--}}
    {{--    </div>--}}
@endsection
