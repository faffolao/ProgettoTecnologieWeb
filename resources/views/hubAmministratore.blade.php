@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="title-with-logo">
                <img src="{{ asset('assets/images/admin_icon.png') }}" alt="Logo admin">
                <h2>Benvenuto nell'Area personale</h2>
            </div>
            <div class="panel-buttons">
                <a href="{{route('gestioneFAQ')}}" class="btn">Gestione F.A.Q.</a>
            </div>
            <div class="panel-buttons">
                <a href="{{route('statistiche')}}" class="btn">Statistiche</a>
            </div>
            <div class="panel-buttons">
                <a href="{{route('cancellazioneClienti')}}" class="btn">Cancellazione clienti</a>
            </div>
            <div class="panel-buttons">
                <a href="{{route('gestioneStaff')}}" class="btn">Gestione staff</a>
            </div>
            <div class="panel-buttons">
                <a href="{{route('gestioneAziende')}}" class="btn">Gestione aziende</a>
            </div>
            <div class="panel-buttons">
                <a href="{{route('homepage')}}" class="btn btn-back">Logout</a>
            </div>
        </div>
    </div>
@endsection
