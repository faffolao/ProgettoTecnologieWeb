@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="title-with-logo">
                <img src="https://i.pinimg.com/736x/f5/d6/85/f5d685ff5c2d96d044570a192c99eac6.jpg" alt="Logo azienda">
                <h2>Nome Offerta</h2>
            </div>

            <div class="toggle-list">
                <ul>
                    <li class="toggle" title="Clicca qui per aprire la descrizione dell'offerta"><h2>Descrizione</h2>
                        <ul class="sub-list hidden">
                            <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et gravida diam, q
                                    uis pellentesque ex. Sed eros magna, eleifend a dictum id, volutpat et libero. Vestibulum
                                    lectus nulla, aliquet ac felis ac, lobortis placerat nulla. Duis bibendum ligula ac felis
                                    feugiat vestibulum. Nam porttitor velit quis augue commodo bibendum.
                                </p></li>
                        </ul>
                    </li>
                    <li class="toggle" title="Clicca qui per leggere il luogo di fruizione dell'offerta"><h2>Luoghi di Fruizione</h2>
                        <ul class="sub-list hidden">
                            <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et gravida diam, q
                                    uis pellentesque ex. Sed eros magna, eleifend a dictum id, volutpat et libero. Vestibulum
                                    lectus nulla, aliquet ac felis ac, lobortis placerat nulla. Duis bibendum ligula ac felis
                                    feugiat vestibulum. Nam porttitor velit quis augue commodo bibendum.
                                </p></li>
                        </ul>
                    </li>
                    <li class="toggle" title="Clicca qui per sapere quando l'offerta scade"><h2>Data di Scadenza</h2>
                        <ul class="sub-list hidden">
                            <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et gravida diam, q
                                    uis pellentesque ex. Sed eros magna, eleifend a dictum id, volutpat et libero. Vestibulum
                                    lectus nulla, aliquet ac felis ac, lobortis placerat nulla. Duis bibendum ligula ac felis
                                    feugiat vestibulum. Nam porttitor velit quis augue commodo bibendum.
                                </p></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="panel-buttons">
                <a class="btn" href="{{ route('catalogo') }}">Torna indietro</a>
                <a class="btn" href="{{ route('getCoupon') }}">Genera Coupon</a> <br>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/js/toggleListManager.js') }}"></script>
@endsection
