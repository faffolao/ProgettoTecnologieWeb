@extends('layouts.skel')

@section('content')
    <div class="wrapper">
        <div class="form-box form-box-inputdialog login">
            <h2>Modifica dati personali</h2>
            <br>
            <form class="form-insertFAQ" {{--action={{url('/modificaDati_L1/'.$dati['id'])}} method="POST"--}}>
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-left">
                        <fieldset title="Modifica i tuoi dati personali">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" required>

                            <label for="cognome">Cognome:</label>
                            <input type="text" id="cognome" name="cognome" required>

                            <label for="data_nascita">Data di nascita:</label>
                            <input type="date" id="data_nascita" name="data_nascita" required>

                            <fieldset title="Inserisci il tuo sesso" class="sex">
                                <legend>Sesso:</legend>
                                <label for="maschio">
                                    <input type="radio" id="maschio" name="sesso" value="maschio"> Maschio </label>
                                <label for="femmina">
                                    <input type="radio" id="femmina" name="sesso" value="femmina"> Femmina </label>
                                <label for="altro">
                                    <input type="radio" id="altro" name="sesso" value="altro"> Altro </label>
                            </fieldset>

                            <label for="telefono">Telefono:</label>
                            <input type="tel" id="telefono" name="telefono" required>

                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </fieldset>
                    </div>
                    <div class="form-right">
                        <fieldset title="Modifica i tuoi dati identificativi">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" required>

                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required>
                        </fieldset>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <button type="submit" class="btn">Modifica dati</button>
                <br>
            </form>
            <div class="panel-buttons">
                <a class="btn btn-back" href="{{ route('hubUtente') }}">Torna indietro</a>
            </div>
        </div>
@endsection
