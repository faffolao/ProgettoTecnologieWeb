@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="title-with-logo">
                <img src="{{ asset('assets/images/customer_icon.png') }}" alt="Logo utente">
                @auth
                    <h2>Benvenuto nell'Area personale, {{ $user->name }} {{ $user->surname }} </h2>
                {{--{{ Auth::user()->surname }}--}}
                @else
                    <h2>Benvenuto nell'Area personale</h2>
                @endauth
            </div>

            <div class="panel-buttons">
                <a href="{{ route('modificaDatiL1') }}" class="btn">Modifica dati personali</a>
            </div>
            <div class="panel-buttons">
                <a href="{{ route('listaCouponUsati') }}" class="btn">Visualizza i coupon utilizzati</a>
            </div>
            <div class="panel-buttons">
                <a href="{{route('logout')}}" class="btn btn-back">Logout</a>
            </div>
        </div>
    </div>
@endsection
