@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="title-with-logo">
                <img src="{{ asset('assets/images/staff_icon.png') }}" alt="Logo staff">
                <h2>Benvenuto nell'Area personale</h2>
            </div>
            <div class="panel-buttons">
                <a href="#" class="btn">Modifica dati personali</a>
            </div>
            <div class="panel-buttons">
                <a href="{{route('modificaOfferte')}}" class="btn">Gestione offerte</a>
            </div>
            <div class="panel-buttons">
                <a href="{{route('homepage')}}" class="btn">Logout</a>
            </div>
        </div>
    </div>
@endsection
