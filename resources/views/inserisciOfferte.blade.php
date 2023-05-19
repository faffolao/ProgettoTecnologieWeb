@extends('layouts.skel')

@section('content')
    <!-- il wrapper è il contenitore che contiene il box della form di login -->
    <div>
        <!-- box che contiene la form di login -->
        <div class="form-box form-box-inputdialog">
            <h2>Inserisci una nuova offerta</h2>

            <!-- effettiva form di input -->
            <form>
                <div class="form-row">
                    <div class="form-left">
                        <fieldset title="Inserisci dati offerta">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" required>

                            <label for="oggetto">Oggetto:</label>
                            <input type="text" id="oggetto" name="oggetto" required>

                            <label for="modalitaFruizione">Modalità di fruizione:</label>
                            <input type="text" id="modalitaFruizione" name="modalitaFruizione" required>
                        </fieldset>
                    </div>
                    <div class="form-right">
                        <fieldset title="Inserisci dati offerta">
                            <label for="luogoFruizione">Luogo di fruizione:</label>
                            <input type="text" id="luogoFruizione" name="luogoFruizione" required>

                            <label for="data_ora_scadenza">Data e ora di scadenza:</label>
                            <input type="date" id="data_ora_scadenza" name="data_ora_scadenza" required>

                            <fieldset title="Carica immagini in formato .png o .jpeg">
                                <label for="logo">Carica l'immagine dell'offerta:</label>
                                <input type="file" id="logo" name="logo"
                                       accept="image/png, image/jpeg" required>
                            </fieldset>
                        </fieldset>
                    </div>
                </div>

                <div style="clear:both;"></div>

                <button type="submit" class="btn">Inserisci Offerta</button>
                <div class="panel-buttons">
                    <a class="btn btn-back" href="{{ route('modificaOfferte') }}">Torna indietro</a>
                </div>
            </form>
        </div>
    </div>
@endsection
