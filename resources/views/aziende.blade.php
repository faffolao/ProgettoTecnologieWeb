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
        <div class="card">
            <img src="{{ asset('assets/images/logo_adidas.png') }}" alt="Service Image" class="logo-azienda">
            <a class="card-title-link" href="{{ route('dettagliAzienda') }}">Adidas</a>
        </div>
        <div class="card">
            <img src="{{ asset('assets/images/default_logo.png') }}" alt="Service Image">
            <a class="card-title-link" href="{{ route('dettagliAzienda') }}">Apple</a>
        </div>
        <div class="card">
            <img src="https://seeklogo.com/images/M/microsoft-logo-8EE94BD68A-seeklogo.com.png" alt="Service Image">
            <a class="card-title-link" href="{{ route('dettagliAzienda') }}">Microsoft</a>
        </div>
        <div class="card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Dyson_logo.svg/2560px-Dyson_logo.svg.png" alt="Service Image">
            <a class="card-title-link" href="{{ route('dettagliAzienda') }}">Dyson</a>
        </div>
        <div class="card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Samsung_Logo.svg/2560px-Samsung_Logo.svg.png" alt="Service Image">
            <a class="card-title-link" href="{{ route('dettagliAzienda') }}">Samsung</a>
        </div>
        <div class="card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/03/Lenovo_Global_Corporate_Logo.png" alt="Service Image">
            <a class="card-title-link" href="{{ route('dettagliAzienda') }}">Lenovo</a>
        </div>
        <div class="card">
            <img src="https://upload.wikimedia.org/wikipedia/en/0/05/Myprotein_logo.png" alt="Service Image">
            <a class="card-title-link" href="{{ route('dettagliAzienda') }}">MyProtein</a>
        </div>
        <div class="card">
            <img src="https://www.orafoleo.it/wp-content/uploads/2020/06/danielwellington_logo.png" alt="Service Image">
            <a class="card-title-link" href="{{ route('dettagliAzienda') }}">Daniel Wellington</a>
        </div>
        <div class="card">
            <img src="https://1000marche.net/wp-content/uploads/2021/01/Just-Eat-logo.png" alt="Service Image">
            <a class="card-title-link" href="{{ route('dettagliAzienda') }}">Just Eat</a>
        </div>
        <div class="card">
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/0/04/Huawei_Standard_logo.svg/2016px-Huawei_Standard_logo.svg.png" alt="Service Image">
            <a class="card-title-link" href="{{ route('dettagliAzienda') }}">Huawei</a>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset("assets/js/searchAzienda.js") }}"></script>
@endsection
