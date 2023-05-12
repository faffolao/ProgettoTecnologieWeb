@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="hub">
            <h2>Benvenuto Utente</h2>
            <div class="box">
                <button onclick="window.location.href='home.html'">Logout</button>
            </div>
            <div class="box">
                <button onclick="window.location.href='modificaDatiPersonaliUtente.html'">Modifica dati personali</button>
            </div>
            <div class="box">
                <button onclick="window.location.href='listaCouponUtilizzati.html'">Visualizza coupon utilizzati</button>
            </div>
        </div>
    </div>
@endsection
