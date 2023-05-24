@extends('layouts.skel')

@section('content')
    <div class="wrapper">
        <div class="form-box form-box-inputdialog">
            <h2>Aggiorna Azienda</h2>
            <br>
            <form action={{ url('/aggiornaAziende/'.$dati['id']) }} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-left">
                        <fieldset title="Aggiorna i dati dell'azienda">
                            <label for="nome">Aggiorna il nome:</label>
                            <input type="text" id="nome" name="nome" value="{{$dati['nome']}}" required>

                            <label for="descrizione">Descrizione:</label>
                            <textarea id="descrizione" name="descrizione" required>{{$dati['descrizione']}}</textarea>

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
                                <p><em>Logo attualmete selezionato:</em></p>
                                <img src="data:image/png/jpg/webp/jpeg/bin;base64,{{ base64_encode($dati['logo']) }}" class="form-image-input-preview" alt="Logo Azienda">
                                <input type="file" id="logo" name="logo"
                                       accept="image/png, image/jpeg, image/bin, image/jpg">
                            </fieldset>
                        </fieldset>
                    </div>
                </div>

                <button class="btn" type="submit">Aggiorna l'azienda</button>
            </form>
            <div class="panel-buttons">
                <a class="btn btn-back" href="{{ route('gestioneAziende') }}">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection

