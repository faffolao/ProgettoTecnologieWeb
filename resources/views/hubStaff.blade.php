@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="title-with-logo">
                <img src="{{ asset('assets/images/staff_icon.png') }}" alt="Logo staff">
                <h2>Benvenuto nell'Area personale, {{ Auth::user()->nome }} {{ Auth::user()->cognome }}</h2>
            </div>
            <div class="panel-buttons">
                <a href="{{route('modificaDatiL2', Auth::user()->username)}}" class="btn">Modifica dati personali</a>
            </div>
            <div class="panel-buttons">
                <a href="{{route('gestioneOfferte')}}" class="btn">Gestione offerte</a>
            </div>
            {{--    <div class="panel-buttons">
                    <a href="{{route('logout')}}" class="btn btn-back">Logout</a>
                </div>
            --}}
            <div class="panel-buttons">
                <a href="" class="btn btn-back" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection
