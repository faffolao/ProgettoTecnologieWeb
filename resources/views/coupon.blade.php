<!DOCTYPE html>
<!--
    NOTA IMPORTANTE
    La pagina che contiene il coupon generato è una pagina avente un layout particolare e specifico solo per questa
    Non verrà quindi importato lo scheletro creato in Blade (layouts/skel), tipico invece di tutte le altre pagine di
    questo sito web.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- metadati per la visualizzazione della pagina -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- titolo della pagina -->
    <title>Coupon offerta</title>

    <!-- icona della pagina (favicon) -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- importo il mio foglio di stile e il foglio di stile di Material Icons, per aggiungere l'icona della stampante
    (per il tasto Stampa) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/couponPage.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- includo la libreria esterna di JS che permette di generare un QR code a partire da una stringa. Verrà impiegata
    per generare il QR code del coupon -->
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
</head>

<body>
<!-- pulsante per stampare la pagina -->
<button class="print-icon" onclick="stampaPagina()">
    <!-- Questo mi serve per importare l'iconcina dedicata al print -->
    <i class="material-icons">print</i>
</button>

<!-- logo di Offertopoli - posto in basso a sinistra -->
<img src="{{ asset('assets/images/logo_with_text.png') }}" class="site-logo" alt="Logo di Offertopoli">

<main>
    <div class="container">
        <h1>{{$tuple['nome']}}</h1>

        <img src="https://api.qrserver.com/v1/create-qr-code/?data=IY7FSDYKI3CWUTKFKG" alt="Codice QR del coupon" width="200px">
        <h2>Codice alfanumerico: {{--<span id="codice-generato"></span>--}} {{$datiCoupon['codice']}}</h2>

        <h2>Data Creazione:{{--<?php echo date('d/m/Y'); ?>--}} {{$datiCoupon['dataOraCreazione']}}</h2>
        <h2>Data Scadenza:{{--<?php echo date('d/m/Y'); ?>--}} {{$tuple['dataOraScadenza']}}</h2>
        <h2>Cliente: {{$cliente['nome']}} {{$cliente['cognome']}}</h2>
    </div>
</main>

<footer class="can-hide">
    <a href="{{ route('catalogo') }}">Torna al catalogo delle offerte</a>
    <a href="{{ route('hubUtente') }}">Torna nel tuo Hub</a>
</footer>

<script type="text/javascript" src="{{ asset('assets/js/couponPageFunctions.js') }}"></script>
</body>
</html>
