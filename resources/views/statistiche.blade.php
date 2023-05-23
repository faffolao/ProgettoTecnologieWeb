@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <h1>Statistiche</h1>

            <div class="two-cols-layout">
                <div class="col">
                    <h2 class="col-title">Per promozione</h2>

                    <div class="hint-container">
                        <img src="{{ asset('assets/images/shop.jpg') }}">
                        <span id="promoCouponsNumber">Clicca su una promozione per conoscere il numero di coupon emessi per questa.</span>
                    </div>

                    <div class="list">
                        @foreach($Promo as $promo)
                            <a href="#" onclick="getPromoCoupons({{ $promo['id'] }})" class="list-item">
                                [{{ $promo['id'] }}] {{ $promo['nome'] }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="col">
                    <h2 class="col-title">Per cliente</h2>

                    <div class="hint-container">
                        <img src="{{ asset('assets/images/customers.png') }}" width="30">
                        <span id="customerCouponsNumber">Clicca su un cliente per conoscere quanti coupon ha richiesto.</span>
                    </div>

                    <div class="list">
                        @foreach($Clienti as $cliente)
                            <a href="#" onclick="getClientiCoupons('{{ $cliente['username'] }}')" class="list-item">
                                {{ $cliente['nome'] }} {{ $cliente['cognome'] }} ({{ $cliente['username'] }})
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <p class="emphatized-text">
                In totale sono stati emessi <strong id="numCoupon">{{ $NumeroCoupon }}</strong> coupons.
            </p>

            <div class="panel-buttons">
                <a href="{{ route('hubAmministratore') }}" class="btn btn-back">Torna indietro</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/statsManager.js') }}"></script>

    <script>
        // qui ci metto gli URL necessari per le due chiamate AJAX possibili con questa pagina
        // queste variabili verranno poi chiamate dalle funzioni che eseguono le chiamate AJAX.
        var promoCouponsUrl = "{{ route('statistiche.offerta') }}";
        var clienteCouponsUrl = "{{ route('statistiche.cliente') }}";

        // NOTA: il token CSRF viene incluso nelle chiamate AJAX perchè viene richiesto da Laravel, allo scopo di impedire
        // gli attacchi di tipologia Cross-Site Request Forgery (CSRF).
        var csrfToken = "{{ csrf_token() }}";
    </script>
@endsection
