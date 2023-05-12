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
                Siamo Scontopoli, un nuovo sito web che permette ai nostri clienti di ottenere coupons per usufruire dei migliori sconti offerti
                dalle aziende più importanti, di tutte le tipologie: dall'high tech, alla moda, per finire poi con la ristorazione e il mondo del cibo.<br><br>
                I nostri coupon sono liberamente stampabili e facili da usare; inoltre, per ogni coupon, mettiamo tutte le istruzioni in
                chiaro per poterlo usare nei negozi e in tutti i locali partecipanti.
            </p>
        </div>

        <h2>Alcune delle aziende associate</h2>
        <!-- le aziende vengono rappresentate graficamente come delle Card (carte), contenute in un Card Deck -->
        <div class="card-deck">
            <div class="card">
                <img src="{{ asset('assets/images/logo_adidas.png') }}" alt="Service Image" class="logo-azienda">
                <a class="card-title-link" href="#">Adidas</a>
            </div>
            <div class="card">
                <img src="{{ asset('assets/images/default_logo.png') }}" alt="Service Image">
                <a class="card-title-link" href="#">Apple</a>
            </div>
            <div class="card">
                <img src="https://seeklogo.com/images/M/microsoft-logo-8EE94BD68A-seeklogo.com.png" alt="Service Image">
                <a class="card-title-link" href="#">Microsoft</a>
            </div>
            <div class="card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Dyson_logo.svg/2560px-Dyson_logo.svg.png" alt="Service Image">
                <a class="card-title-link" href="#">Dyson</a>
            </div>
            <div class="card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Samsung_Logo.svg/2560px-Samsung_Logo.svg.png" alt="Service Image">
                <a class="card-title-link" href="#">Samsung</a>
            </div>
            <div class="card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/03/Lenovo_Global_Corporate_Logo.png" alt="Service Image">
                <a class="card-title-link" href="#">Lenovo</a>
            </div>
            <div class="card">
                <img src="https://upload.wikimedia.org/wikipedia/en/0/05/Myprotein_logo.png" alt="Service Image">
                <a class="card-title-link" href="#">MyProtein</a>
            </div>
            <div class="card">
                <img src="https://www.orafoleo.it/wp-content/uploads/2020/06/danielwellington_logo.png" alt="Service Image">
                <a class="card-title-link" href="#">Daniel Wellington</a>
            </div>
            <div class="card">
                <img src="https://1000marche.net/wp-content/uploads/2021/01/Just-Eat-logo.png" alt="Service Image">
                <a class="card-title-link" href="#">Just Eat</a>
            </div>
            <div class="card">
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/0/04/Huawei_Standard_logo.svg/2016px-Huawei_Standard_logo.svg.png" alt="Service Image">
                <a class="card-title-link" href="#">Huawei</a>
            </div>
        </div>

        <h2>F.A.Q.</h2>
        <div class="faq">
            <p>Queste sono le domande più frequenti che gli utenti ci pongono. Clicca sulla domanda che ti interessa per scoprire la risposta!</p>
            <ul>
                <li>
                    <div class="question">Come faccio ad applicare un coupon?</div>
                    <div class="answer">
                        &Egrave; sufficiente selezionare l'offerta desiderata e cliccare sul tasto Genera coupon. Per poter usufruire
                        dei coupon è necessario aver effettuato il login (quindi essere registrati sul nostro sito!)
                    </div>
                </li>
                <li>
                    <div class="question">Posso ottenere più coupon per la stessa offerta?</div>
                    <div class="answer">
                        No, purtroppo le nostre politiche non consentono l'applicazione di più coupon per la stessa offerta.
                        L'utente potrà quindi ottenere un solo coupon per ogni offerta che desidera.
                    </div>
                </li>
                <li>
                    <div class="question">L'uso dei coupon generati da Offertopoli è soggetto a pagamento?</div>
                    <div class="answer">
                        No, l'uso e la generazione dei coupon di Offertopoli è completamente gratuito; non è quindi richiesto
                        nessun pagamento e nessun inserimento di qualche carta di credito.
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/js/homepage.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/faq_viewer.js') }}"></script>
@endsection
