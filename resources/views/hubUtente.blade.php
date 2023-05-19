@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="title-with-logo">
                <img src="{{ asset('assets/images/customer_icon.png') }}" alt="Logo utente">
                <h2>Benvenuto nell'Area personale</h2>
            <!--    <p> {{Auth::user() -> nome }} {{Auth::user() -> cognome }}</p>  -->
            </div>

            <div class="panel-buttons">
                <a href="{{ route('modificaDatiL1') }}" class="btn">Modifica dati personali</a>
            </div>
            <div class="panel-buttons">
                <a href="#" class="btn">Visualizza coupon utilizzati</a>
            </div>
            <div class="panel-buttons">
                <a href="#" class="btn">Logout</a>
            </div>
        </div>
    </div>
@endsection
