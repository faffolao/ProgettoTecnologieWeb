@extends('layouts.skel')

@section('content')
    <div class="container">
        <h1>Lista delle aziende associate</h1>
        <div class="desc">
            <p>Questa è la lista di tutte le aziende associate a Offertopoli e che pubblicano offerte. Clicca su un'azienda per
                scoprirne tutti i dettagli.</p>
        </div>

        <div class="search-container">
            <form>
                <div class="search-wrapper">
                    <!-- l'evento onkeyup viene attivato quando viene premuto un tasto qualsiasi della tastiera quando ho il focus sull'input -->
                    <input type="text" id="search-bar" onkeyup="search()" placeholder="Cerca un'azienda..." title="Cerca un'azienda">
                    <button type="button"><img src="{{ asset("assets/images/search.svg") }}" alt="Cerca"></button>
                </div>
            </form>
        </div>

        <div id="section-offerte" class="card-deck">
            @foreach($Aziende as $aziende)
                <div class="card">
                    <img src="data:image/png/jpeg;base64,{{ base64_encode($aziende['logo']) }}" alt="Service Image" class="logo-azienda">
                    <a class="card-title-link" href="{{ route('dettagliAzienda') }}">{{$aziende['nome']}}</a>
                </div>
            @endforeach
        </div>
    </div>

    <script type="text/javascript" src="{{ asset("assets/js/searchAzienda.js") }}"></script>
@endsection
