@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="title-with-logo">
                <img src="{{ asset('assets/images/customer_icon.png') }}" alt="Logo utente">
                @auth
                    <h2>Benvenuto nell'Area personale, {{ Auth::user()->nome }} {{ Auth::user()->cognome }} </h2>
                    {{--{{ Auth::user()->surname }}--}}
                @else
                    <h2>Benvenuto nell'Area personale</h2>
                @endauth
            </div>

            <div class="panel-buttons">
                <a href="{{ route('modificaDatiL1') }}" class="btn">Modifica dati personali</a>
            </div>
            <div class="panel-buttons">
                <a href="{{ route('listaCouponUsati', Auth::user()->username ) }}" class="btn">Visualizza i coupon utilizzati</a>
            </div>
            {{--  <div class="panel-buttons">
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
