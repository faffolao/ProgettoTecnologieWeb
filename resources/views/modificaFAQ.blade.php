@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
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
                        <td><button class="update-btn" onclick="window.location.href='inserisciFAQ.html'">Modifica</button></td>
                        <td>
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
            <button type="button" class="btn btn-back" onclick="window.location.href='gestioneFAQ.html'">Torna indietro</button>
        </div>
    </div>
@endsection
