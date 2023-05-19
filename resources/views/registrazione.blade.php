@extends('layouts.skel')

@section('title', 'Registrazione')

@section('content')
    <!-- il wrapper è il contenitore che contiene il box della form di login -->
    <div class="wrapper wrapper-register">
        <!-- box che contiene la form di login -->
        <div class="form-box form-box-inputdialog login">
            <h2>Registrazione</h2>

            <!-- effettiva form di input -->
            <form>
                <div class="form-row">
                    <div class="form-left">
                        <fieldset title="Inserisci i tuoi dati personali">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" required>

                            <label for="cognome">Cognome:</label>
                            <input type="text" id="cognome" name="cognome" required>

                            <label for="data_nascita">Data di nascita:</label>
                            <input type="date" id="data_nascita" name="data_nascita" required>

                            <fieldset title="Inserisci il tuo sesso" style="display: flex;">
                                <legend>Sesso:</legend>
                                <label for="maschio">
                                    <input type="radio" id="maschio" name="sesso" value="maschio" checked> Maschio&nbsp;&nbsp;</label>
                                <label for="femmina">
                                    <input type="radio" id="femmina" name="sesso" value="femmina"> Femmina&nbsp;&nbsp;</label>
                                <label for="altro">
                                    <input type="radio" id="altro" name="sesso" value="altro"> Altro&nbsp;&nbsp;</label>
                            </fieldset>

                            <label for="telefono">Telefono:</label>
                            <input type="tel" id="telefono" name="telefono" required>

                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </fieldset>
                    </div>
                    <div class="form-right">
                        <fieldset title="Inserisci i tuoi dati identificativi">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" required>

                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required>
                        </fieldset>
                    </div>
                </div>

                <div style="clear:both;"></div>

                <button type="submit" class="btn">Registrazione</button>

                <div class="register">
                    <p>Hai già un account?<b><a href="{{ route('login') }}" class="register-link">
                                Effettua il Login</a></b>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
