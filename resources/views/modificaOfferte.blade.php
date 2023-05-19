@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
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
            <button type="button" class="btn btn-back" onclick="window.location.href='gestioneOfferte.html'">Torna indietro</button>
        </div>
    </div>
@endsection

