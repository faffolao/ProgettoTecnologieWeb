@extends('layouts.skel')

@section('content')
    <div class="search-container">
        <form id="search-form" method="POST" action="{{route('catalogo')}}">
            @csrf
            <div class="search-wrapper">
                <!-- l'evento onkeyup viene attivato quando viene premuto un tasto qualsiasi della tastiera quando ho il focus sull'input -->
                <input type="text" id="search-bar" name="query" {{--onkeyup="search()"--}} placeholder="Cerca un'offerta..." title="Cerca un'offerta scrivendo qui e poi premendo il taSto INVIO/ENTER">
                <button type="submit"><img src="{{ asset("assets/images/search.svg") }}" alt="Cerca"></button>
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
                    <li><a href="{{ route('catalogo') }}">Tutte le Aziende</a></li>
                    @foreach($Aziende as $azienda)
                        <li><a href="{{ url('/catalogo/'.$azienda['id']) }}">{{$azienda['nome']}}</a></li>
                    @endforeach
                </ul>
            </div>
        </aside>
        <div id="section-offerte" class="card-deck">
            @if(isset($ListOfferte))
                @foreach($ListOfferte as $Sofferta)
                    <div class="card">
                        <img src="data:image/png/jpg/webp/jpeg;base64,{{ base64_encode($Sofferta['immagine']) }}" alt="Offerta">
                        <h3>{{$Sofferta['nome']}}</h3>
                        <p>{{$Sofferta['oggetto']}}</p>
                        <a href="{{ url('/dettagliOfferta/'.$Sofferta['id']) }}" class="card-btn">Scopri di più</a>
                    </div>
                @endforeach
            @elseif(isset($nOOfferte))
                @foreach($nOOfferte as $nOOfferta)
                    <div class="card">
                        <img src="data:image/png/jpg/webp/jpeg;base64,{{ base64_encode($nOOfferta['immagine']) }}" alt="Offerta">
                        <h3>{{$nOOfferta['nome']}}</h3>
                        <p>{{$nOOfferta['oggetto']}}</p>
                        <a href="{{ url('/dettagliOfferta/'.$nOOfferta['id']) }}" class="card-btn">Scopri di più</a>
                    </div>
                @endforeach
            @else
                @foreach($Offerte as $offerte)
                    <div class="card">
                        <img src="data:image/png/jpg/webp/jpeg;base64,{{ base64_encode($offerte['immagine']) }}" alt="Offerta">
                        <h3>{{$offerte['nome']}}</h3>
                        <p>{{$offerte['oggetto']}}</p>
                        <a href="{{ url('/dettagliOfferta/'.$offerte['id']) }}" class="card-btn">Scopri di più</a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/js/searchOfferta.js') }}"></script>
@endsection
