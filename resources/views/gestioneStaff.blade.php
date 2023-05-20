@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <h2>Gestione Staff</h2>
            <br>
            <div class="search-container">
                <form id="search-form" method="POST" action="{{route('gestioneStaff')}}">
                    @csrf
                    <div class="search-wrapper">
                        <!-- l'evento onkeyup viene attivato quando viene premuto un tasto qualsiasi della tastiera quando ho il focus sull'input -->
                        <input type="text" id="search-bar" name="query" onkeyup="search()" placeholder="Cerca un membro dello Staff..." title="Cerca un membro dello staff scrivendo qui e poi premendo il tasto INVIO/ENTER">
                        <button type="submit"><img src="{{ asset("assets/images/search.svg") }}" alt="Cerca"></button>
                    </div>
                </form>
            </div>
            <table class="tabella">
                <tbody>
                <tr>
                    <th style="text-align: center;">Vuoi inserire un nuovo membro dello Staff?</th>
                    <th style="text-align: left;">
                        <a href="{{route('inserisciStaff')}}" class="btn btn-Ins">Inserisci</a>
                    </th>
                </tr>
                </tbody>
            </table>
            <br>
            <br>
            <table class="tabella">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Modifica</th>
                    <th>Elimina</th>
                </tr>
                </thead>
                <tbody>
                @foreach($List as $list)
                    <tr>
                        <td>{{$list['username']}}</td>
                        <td title="Clicca qui per AGGIORNARE la seguente offerta"><a class="update-btn" href="{{route('aggiornaStaff', $list['username'])}}">Modifica</a></td>
                        <td title="Clicca qui per ELIMINARE la seguente offerta">
                            <form class="delete-form" action="{{ route('eliminaStaff', $list['username']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Sei sicuro di voler eliminare questo membro dello Staff')">
                                    Elimina</button>
                            </form>
                        </td>
                        {{--                        <td><button class="delete-btn">Elimina</button></td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="panel-buttons">
                <a class="btn btn-back" href="{{ route('hubAmministratore') }}">Torna indietro</a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('assets/js/searchGestioneStaff.js') }}"></script>
@endsection

