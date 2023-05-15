@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="title-with-logo">
                <img src="data:image/png/jpeg;base64,{{ base64_encode($tuple['immagine']) }}" alt="Immagine Offerta">
                <h2>{{$tuple['nome']}}</h2>
            </div>

            <div class="toggle-list">
                <ul>
                    <li class="toggle" title="Clicca qui per aprire la descrizione dell'offerta"><h2>Descrizione</h2>
                        <ul class="sub-list hidden">
                            <li><p>{{$tuple['oggetto']}}</p></li>
                        </ul>
                    </li>
                    <li class="toggle" title="Clicca qui per leggere il luogo di fruizione dell'offerta"><h2>Luoghi di Fruizione</h2>
                        <ul class="sub-list hidden">
                            <li><p>{{$tuple['luogoFruizione']}}</p></li>
                        </ul>
                    </li>
                    <li class="toggle" title="Clicca qui per leggere la modalità di fruizione dell'offerta"><h2>Modalità di Fruizione</h2>
                        <ul class="sub-list hidden">
                            <li><p>{{$tuple['modalitaFruizione']}}</p></li>
                        </ul>
                    </li>
                    <li class="toggle" title="Clicca qui per sapere quando l'offerta è stata creata"><h2>Data di Creazione</h2>
                        <ul class="sub-list hidden">
                            <li><p>{{$tuple['dataOraCreazione']}}</p></li>
                        </ul>
                    </li>
                    <li class="toggle" title="Clicca qui per sapere quando l'offerta scade"><h2>Data di Scadenza</h2>
                        <ul class="sub-list hidden">
                            <li><p>{{$tuple['dataOraScadenza']}}</p></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="panel-buttons">
                <a class="btn" href="{{ route('catalogo') }}">Torna indietro</a>
                <a class="btn" href="{{ url('/coupon/'.$tuple['id']) }}">Genera Coupon</a> <br>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/js/toggleListManager.js') }}"></script>
@endsection
