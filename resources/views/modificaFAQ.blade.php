@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <h2>Gestione F.A.Q.</h2>
            <br>
            {{--            Inserire form inserisci F.A.Q.--}}
            <table class="tabella">
                <tbody>
                <tr>
                    <th style="text-align: center;">Vuoi inserire una nuova F.A.Q.?</th>
                    <th style="text-align: left;">
                        <a href="{{route('inserisciFAQ')}}" class="btn btn-FAQ">Inserisci</a>
                    </th>
                </tr>
                </tbody>
            </table>
            <br>
            <br>
            <table class="tabella">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Domanda</th>
                    <th>Risposta</th>
                    <th>Modifica</th>
                    <th>Elimina</th>
                </tr>
                </thead>
                <tbody>
                @foreach($List as $list)
                    <tr>
                        <td>{{$list['id']}}</td>
                        <td>{{$list['domanda']}}</td>
                        <td>{{$list['risposta']}}</td>
                        <td title="Clicca qui per AGGIORNARE la seguente domanda/risposta"><a class="update-btn" href="{{route('aggiornaFAQ', $list['id'])}}">Modifica</a></td>
                        <td title="Clicca qui per ELIMINARE la seguente domanda/risposta">
                            <form class="delete-form" action="{{ route('eliminaFAQ', $list['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Sei sicuro di voler eliminare questa domanda?')">
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
@endsection
