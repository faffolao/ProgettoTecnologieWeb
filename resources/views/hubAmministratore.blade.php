@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="title-with-logo">
                <img src="{{ asset('assets/images/admin_icon.png') }}" alt="Logo admin">
                <h2>Benvenuto nell'Area personale</h2>
            </div>
            <div class="panel-buttons">
                <a href="{{route('homepage')}}" class="btn">Logout</a>
            </div>
            <div class="panel-buttons">
                <a href="{{route('modificaFAQ')}}" class="btn">Gestione F.A.Q.</a>
            </div>
            <div class="panel-buttons">
                <a href="#" class="btn">Statistiche</a>
            </div>
            <div class="panel-buttons">
                <a href="{{route('cancellazioneClienti')}}" class="btn">Cancellazione clienti</a>
            </div>
            <div class="panel-buttons">
                <a href="#" class="btn">Gestione staff</a>
            </div>
            <div class="panel-buttons">
                <a href="#" class="btn">Gestione aziende</a>
            </div>
        </div>
    </div>
@endsection
