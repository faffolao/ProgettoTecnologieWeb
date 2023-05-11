@extends('layouts.skel')

@section('content')
<div class="container">
    <h1>Lista delle offerte utilizzabili</h1>
    <div class="desc">
        <p>Questa è la lista di tutte le offerte attualmente disponibili. Se vuoi usufruire di una di queste, accedi con le tue credenziali utente.</p>
    </div>

    <div class="search-container">
        <form>
            <div class="search-wrapper">
                <!-- l'evento onkeyup viene attivato quando viene premuto un tasto qualsiasi della tastiera quando ho il focus sull'input -->
                <input type="text" id="search-bar" onkeyup="search()" placeholder="Cerca un'offerta..." title="Cerca un'offerta">
                <button type="button"><img src="{{ asset("assets/images/search.svg") }}" alt="Cerca"></button>
            </div>
        </form>
    </div>

    <div id="section-offerte" class="card-deck">
        <div class="card">
            <img src="{{ asset('assets/images/logo_adidas.png') }}" alt="Service Image" class="logo-azienda">
            <a class="card-title-link" href="#">10% di sconto se acquisti almeno due prodotti di marchio Adidas</a>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset("assets/js/searchOfferta.js") }}"></script>
@endsection