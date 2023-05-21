@extends('layouts.skel')

@section('content')
    <div class="wrapper wrapper-register">
        <div class="form-box form-box-inputdialog">
            <h2>Aggiorna Azienda</h2>
            <br>
            <form class="contact-form" action={{url('/aggiornaAziende/'.$dati['id'])}} method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-left">
                        <fieldset title="Aggiorna i dati dell'azienda">
                            <label for="nome">Aggiorna il nome:</label>
                            <input type="text" id="nome" name="nome" value="{{$dati['nome']}}" required>

                            <label for="descrizione">Descrizione:</label>
                            <textarea type="text" id="descrizione" name="descrizione" required>{{$dati['descrizione']}}</textarea>

                            <label for="ragioneSociale">Ragione Sociale:</label>
                            <input type="text" id="ragioneSociale" name="ragioneSociale" value="{{$dati['ragioneSociale']}}" required>
                        </fieldset>
                    </div>

                    <div class="form-right">
                        <fieldset title="Aggiorna i dati dell'azienda">
                            <label for="tipologia">Tipologia:</label>
                            <input type="text" id="tipologia" name="tipologia" value="{{$dati['tipologia']}}" required>

                            <fieldset title="Carica immagini in formato .png o .jpeg">
                                <label for="logo">Aggiorna l'immagine dell'Azienda:</label>
                                <p style="margin-bottom: 5px;"><em>Logo attualmete selezionato:</em></p>
                                <img src="data:image/png/jpg/webp/jpeg;base64,{{ base64_encode($dati['logo']) }}" style="max-height: 40%;max-width: 40%;">
                                <input type="file" id="logo" name="logo"
                                       accept="image/png, image/jpeg" value="{{$dati['logo']}}" required>
                            </fieldset>
                        </fieldset>
                    </div>
                </div>

                <button class="btn" type="submit">Aggiorna l'offerta</button>
            </form>
            <div class="panel-buttons">
                <a class="btn btn-back" href="{{ route('gestioneOfferte') }}">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection
