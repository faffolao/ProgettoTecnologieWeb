@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <h2>Aggiorna Offerte</h2>
            <br>
            <form class="form-insertFAQ" action={{url('/aggiornaOfferte/'.$dati['id'])}} method="POST">
                @csrf
                @method('PUT')
                <label for="nome">Aggiorna il nome:</label>
                <input type="text" id="nome" name="nome" value="{{$dati['nome']}}" required>

                <label for="oggetto">Aggiorna l'oggetto:</label>
                <input type="text" id="oggetto" name="oggetto" value="{{$dati['oggetto']}}" required>

                <label for="modalitaFruizione">Modalità di fruizione:</label>
                <input type="text" id="modalitaFruizione" name="modalitaFruizione" value="{{$dati['modalitaFruizione']}}" required>

                <button class="btn" type="submit">Aggiorna l'offerta</button>
            </form>
            <div class="panel-buttons">
                <a class="btn btn-back" href="{{ route('modificaOfferte') }}">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection

