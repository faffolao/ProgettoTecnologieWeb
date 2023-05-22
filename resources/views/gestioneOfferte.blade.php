@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <h2>Gestione Offerte</h2>

            <div class="search-container">
                <form id="search-form" method="POST" action="{{ route('gestioneOfferte') }}">
                    @csrf
                    <div class="search-wrapper">
                        <!-- l'evento onkeyup viene attivato quando viene premuto un tasto qualsiasi della tastiera quando ho il focus sull'input -->
                        <input type="text" id="search-bar" name="query" onkeyup="search()" placeholder="Cerca un'offerta..." title="Cerca un'offerta scrivendo qui e poi premendo il tasto INVIO/ENTER">
                        <button type="submit"><img src="{{ asset("assets/images/search.svg") }}" alt="Cerca"></button>
                    </div>
                </form>
            </div>

            <table class="tabella insert-element-table">
                <tbody>
                    <tr>
                        <td class="insert-element-desc">Vuoi inserire una nuova Offerta?</td>
                        <td class="insert-element-btn-container">
                            <a href="{{route('inserisciOfferte')}}" class="btn btn-FAQ">Inserisci</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <br>
            <br>
            <table class="tabella">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Modifica</th>
                        <th>Elimina</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($List as $list)
                    <tr>
                        <td>{{$list['id']}}</td>
                        <td>{{$list['nome']}}</td>
                        <td title="Clicca qui per AGGIORNARE la seguente offerta"><a class="update-btn" href="{{ route('aggiornaOfferte', $list['id']) }}">Modifica</a></td>
                        <td title="Clicca qui per ELIMINARE la seguente offerta">
                            <form class="delete-form" action="{{ route('eliminaOfferte', $list['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Sei sicuro di voler eliminare questa offerta?')">
                                    Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="panel-buttons">
                <a class="btn btn-back" href="{{ route('hubStaff') }}">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection

