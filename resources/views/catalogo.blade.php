@extends('layouts.skel')

@section('content')
    <div class="search-container">
        <form>
            <div class="search-wrapper">
                <!-- l'evento onkeyup viene attivato quando viene premuto un tasto qualsiasi della tastiera quando ho il focus sull'input -->
                <input type="text" id="search-bar" onkeyup="search()" placeholder="Cerca un'offerta..." title="Cerca un'offerta">
                <button type="button"><img src="{{ asset("assets/images/search.svg") }}" alt="Cerca"></button>
            </div>
        </form>
    </div>

    <div class="container with-aside">
        <aside>
            <div class="aside-nav">
                <ul>
                    <li><h2>Aziende</h2></li>
                </ul>
                <ul>
                    <li><a href="#">Tutte le Aziende</a></li>
                    @foreach($Aziende as $azienda)
                        <li><a href="#">{{$azienda['nome']}}</a></li>
                    @endforeach
                </ul>
            </div>
        </aside>
        <div id="section-offerte" class="card-deck">
            <div class="card">
                <img src="https://www.my-personaltrainer.it/2022/09/26/peperoni-2_900x760.jpeg" alt="Offerta">
                <h3>-50% laptop Samsung</h3>
                <p>Affrettati per ricevere il 50% di sconto sui laptop Samsung!</p>
                <a href="#" class="card-btn">Scopri di più</a>
            </div>
            <div class="card">
                <img src="https://climaidraulica.it/29717-home_default/aspirapolvere-dyson-v10-absolute-senza-sacchetto-rame-nichel-aspiratore-portatile.jpg" alt="Offerta">
                <h3>2 aspirapolveri al prezzo di 1</h3>
                <p>Incredibile offerta di Dyson per i nuovi aspirapolveri V8 e V10</p>
                <a href="#" class="card-btn">Scopri di più</a>
                <!--
                @if(Auth::user()->level == 1)
                <button type="button">Genera coupon</button>
                @endif
                -->
            </div>
            <div class="card">
                <img src="https://m.media-amazon.com/images/I/51PwOB5WjCL._UXNaN_FMjpg_QL85_.jpg" alt="Offerta">
                <h3>30% di sconto per 2 ordini</h3>
                <p>Ottieni il 30% di sconto sul totale dei prossimi 2 ordini - Solo da Just Eat!</p>
                <a href="#" class="card-btn">Scopri di più</a>
            </div>
            <div class="card">
                <img src="https://cdn.dxomark.com/wp-content/uploads/medias/post-147160/Huawei-P60-Pro_featured-image-packshot-review-Recovered.jpg" alt="Offerta">
                <h3>Huawei P60 a prezzo stracciato!</h3>
                <p>Ottieni il nuovo Huawei P60 scontato del 35%!</p>
                <a href="#" class="card-btn">Scopri di più</a>
            </div>
            <div class="card">
                <img src="https://www.lascimmiapensa.com/wp-content/uploads/2022/03/GigaChad.jpg" alt="Offerta">
                <h3>Orologi DW scontatissimi</h3>
                <p>-30% di sconto su una scelta di oltre 100 orologi DW!</p>
                <a href="#" class="card-btn">Scopri di più</a>
            </div>
            <div class="card">
                <img src="https://ih1.redbubble.net/image.3360492331.6473/icr,iphone_14_soft,back,a,x1000-bg,f8f8f8.jpg" alt="Offerta">
                <h3>Sconto di 170 euro per i nuovi iPhone</h3>
                <p>Acquista i nuovi iPhone 14 e ricevi 170 euro di sconto</p>
                <a href="#" class="card-btn">Scopri di più</a>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/js/searchOfferta.js') }}"></script>
@endsection
