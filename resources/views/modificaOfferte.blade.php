@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <h2>Gestione Offerte</h2>
            <br>
            {{--            Inserire form inserisci Offerte--}}
            <table class="tabella">
                <tbody>
                <tr>
                    <th style="text-align: center;">Vuoi inserire una nuova Offerta?</th>
                    <th style="text-align: left;">
                        <a href="{{route('inserisciOfferte')}}" class="btn">Inserisci</a>
                    </th>
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
                        <td><button class="update-btn" onclick="window.location.href='inserisciOfferte.html'">Modifica</button></td>
                        <td>
                            <form class="delete-form" action="{{ route('eliminaOfferte', $list['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Sei sicuro di voler eliminare questa offerta?')">
                                    Elimina</button>
                            </form>
                        </td>
                        {{--                        <td><button class="delete-btn">Elimina</button></td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button type="button" class="btn btn-back" {{ route('hubStaff') }}">Torna indietro</button>
        </div>
    </div>
@endsection

