@extends('layouts.skel')

@section('content')
    <!-- una hero image è un'area che viene particolarmente risaltata -->
    <div class="hero-image">
        <h1>Scontati ma non scontrosi: il momento perfetto per togliersi qualche sfizio</h1>
        <p>Promozioni da tantissime aziende</p>
        <a class="btn" href="{{ route('catalogo') }}">Inizia a sfogliare il catalogo</a>
    </div>

    <div class="container">
        <h2>Chi siamo e cosa facciamo</h2>
        <!-- desc contiene una descrizione della pagina visualizzata -->
        <div class="desc">
            <p>
                Siamo Offertopoli, un nuovo sito web che permette ai nostri clienti di ottenere coupons per usufruire dei migliori sconti offerti
                dalle aziende più importanti, di tutte le tipologie: dall'high tech, alla moda, per finire poi con la ristorazione e il mondo del cibo.<br><br>
                I nostri coupon sono liberamente stampabili e facili da usare; inoltre, per ogni coupon, mettiamo tutte le istruzioni in
                chiaro per poterlo usare nei negozi e in tutti i locali partecipanti.
            </p>
        </div>

        <h2>Alcune delle aziende associate</h2>
        <!-- le aziende vengono rappresentate graficamente come delle Card (carte), contenute in un Card Deck -->
        <div class="card-deck">
            @foreach($Aziende as $aziende)
                <div class="card">
                    <img src="data:image/png/jpeg;base64,{{ base64_encode($aziende['logo']) }}" alt="Service Image" class="logo-azienda">
                    <a class="card-title-link" href="{{ route('dettagliAzienda') }}">{{$aziende['nome']}}</a>
                </div>
            @endforeach
        </div>

        <h2>F.A.Q.</h2>
        <div class="faq">
            <p>Queste sono le domande più frequenti che gli utenti ci pongono. Clicca sulla domanda che ti interessa per scoprire la risposta!</p>
            <ul>
                @foreach($List as $list)
                    <li>
                        <div class="question">{{$list['domanda']}}</div>
                        <div class="answer">{{$list['risposta']}}</div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/js/homepage.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/faq_viewer.js') }}"></script>
@endsection
