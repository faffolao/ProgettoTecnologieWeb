@extends('layouts.skel')


@section('content')
    <div class="container">
        <div class="panel">
            <h1>Statistiche</h1>
            <div class="form-container">
                <h3>Numero totale di Coupon generati</h3>
                <h3><span id="total">0</span></h3>
            </div>
            <div class="panel">
                <table class="tabella">
                    <th>
                        <div class="search-container">
                            <form id="search-form" method="POST" action="{{route('statistiche')}}">
                                @csrf
                                <div class="search-wrapper">
                                    <!-- l'evento onkeyup viene attivato quando viene premuto un tasto qualsiasi della tastiera quando ho il focus sull'input -->
                                    <input type="text" id="search-bar" name="query" onkeyup="search()" placeholder="Cerca un'offerta..." title="Cerca un'offerta scrivendo qui e poi premendo il tasto INVIO/ENTER">
                                    <input type="hidden" name="tipoRicerca" value="username">
                                    <button type="submit"><img src="{{ asset("assets/images/search.svg") }}" alt="Cerca"></button>
                                </div>
                            </form>
                        </div>
                        <div class="form-container">
                            <table class="tabella" title="Tabella che mostra il N° di Coupon utilizzati per Cliente">
                                <thead>
                                <tr>
                                    <th>Username Cliente</th>
                                    <th>N° Coupon utilizzati</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="user">
                                    <td><button class="btnGen" title="Clicca qui per visualizzare il numero di coupon riscattati" onclick="countClicks(1)">Utente 1</button></td>
                                    <td class="numb"><span id="count1">0</span></td>
                                </tr>
                                <tr class="user">
                                    <td><button class="btnGen" title="Clicca qui per visualizzare il numero di coupon riscattati" onclick="countClicks(2)">Utente 2</button></td>
                                    <td class="numb"><span id="count2">0</span></td>
                                </tr>
                                <tr class="user">
                                    <td><button class="btnGen" title="Clicca qui per visualizzare il numero di coupon riscattati" onclick="countClicks(3)">Utente 3</button></td>
                                    <td class="numb"><span id="count3">0</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </th>
                    <th>
                        <div class="search-container">
                            <form id="search-form" method="POST" action="{{route('statistiche')}}">
                                @csrf
                                <div class="search-wrapper">
                                    <!-- l'evento onkeyup viene attivato quando viene premuto un tasto qualsiasi della tastiera quando ho il focus sull'input -->
                                    <input type="text" id="search-bar" name="query" onkeyup="search()" placeholder="Cerca un'offerta..." title="Cerca un'offerta scrivendo qui e poi premendo il tasto INVIO/ENTER">
                                    <input type="hidden" name="tipoRicerca" value="offerta">
                                    <button type="submit"><img src="{{ asset("assets/images/search.svg") }}" alt="Cerca"></button>
                                </div>
                            </form>
                        </div>
                        <div class="form-container">
                            <table class="tabella" title="Tabella che mostra il N° di Coupon erogati per ogni offerta">
                                <thead>
                                <tr>
                                    <th>Id offerta</th>
                                    <th>Nome offerta</th>
                                    <th>N° Coupon erogati</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Offerte as $offerte)
                                        <tr>
                                        <td>{{$offerte['idOfferta']}}</td>
                                        <td>{{}}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </th>
                </table>
                <div class="panel-buttons">
                    <a href="{{route('hubAmministratore')}}" class="btn btn-back">Torna indietro</a>
                </div>
            </div>
        </div>
    </div>
@endsection
