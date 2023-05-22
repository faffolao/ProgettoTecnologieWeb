@extends('layouts.skel')

@section('content')
    <div class="wrapper">
        <div class="form-box form-box-inputdialog login">
            <h2>Modifica dati personali</h2>
            <br>
            <form class="form-insertFAQ" {{--action={{url('/modificaDati_L2/'.$dati['id'])}} method="POST"--}}>
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-left">
                        <fieldset title="Modifica i dati personali">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" required>

                            <label for="cognome">Cognome:</label>
                            <input type="text" id="cognome" name="cognome" required>

                            <label for="eta">Data di nascita:</label>
                            <input type="date" id="eta" name="eta" required>

                            <fieldset title="Inserisci il sesso" class="sex">
                                <legend>Sesso:</legend>
                                <label for="maschio">
                                    <input type="radio" id="maschio" name="sesso" value="maschio"> Maschio </label>
                                <label for="femmina">
                                    <input type="radio" id="femmina" name="sesso" value="femmina"> Femmina </label>
                                <label for="altro">
                                    <input type="radio" id="altro" name="sesso" value="altro"> Altro </label>
                            </fieldset>

                            <label for="telefono">Telefono:</label>
                            <input type="tel" id="telefono" name="telefono" {{--value="{{$dati['telefono']}}"--}} required>

                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" {{--value="{{$dati['email']}}"--}} required>
                        </fieldset>
                    </div>
                    <div class="form-right">
                        <fieldset title="Modifica i dati identificativi">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" {{--value="{{$dati['username']}}"--}} required>

                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" {{--value="{{$dati['password ']}}"--}} required>
                        </fieldset>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <button type="submit" class="btn">Modifica dati</button>
                <br>
            </form>
            <div class="panel-buttons">
                <a class="btn btn-back" href="{{ route('hubStaff') }}">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection


