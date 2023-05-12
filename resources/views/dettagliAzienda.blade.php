@extends('layouts.skel')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="title-with-logo">
                <img src="https://media.printables.com/media/prints/310405/images/2696816_e91a5c47-f516-4f04-9c50-4bac5f94c7fe/thumbs/inside/1280x960/jpg/cover2.webp" alt="Logo azienda">
                <h2 class="nome-offerta">Nome Azienda</h2>
            </div>

            <div class="toggle-list">
                <ul>
                    <li class="toggle" title="Clicca qui per saperne di più!"><h2>Descrizione</h2>
                        <ul class="sub-list hidden">
                            <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et gravida diam, q
                                    uis pellentesque ex. Sed eros magna, eleifend a dictum id, volutpat et libero. Vestibulum
                                    lectus nulla, aliquet ac felis ac, lobortis placerat nulla. Duis bibendum ligula ac felis
                                    feugiat vestibulum. Nam porttitor velit quis augue commodo bibendum.
                                </p></li>
                        </ul>
                    </li>
                    <li class="toggle" title="Clicca qui per saperne di più!"><h2>Tipologia</h2>
                        <ul class="sub-list hidden">
                            <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et gravida diam, q
                                    uis pellentesque ex. Sed eros magna, eleifend a dictum id, volutpat et libero. Vestibulum
                                    lectus nulla, aliquet ac felis ac, lobortis placerat nulla. Duis bibendum ligula ac felis
                                    feugiat vestibulum. Nam porttitor velit quis augue commodo bibendum.
                                </p></li>
                        </ul>
                    </li>
                    <li class="toggle" title="Clicca qui per saperne di più!"><h2>Ragione Sociale</h2>
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

            <br><br>
            <div style="text-align: center">
                <a class="btn" href="{{ route('aziende') }}">Torna alla lista delle aziende</a><br><br>
            </div>
        </div>

        <script type="text/javascript" src="{{ asset('assets/js/infoAziendaToggleListManager.js') }}"></script>
    </div>
@endsection
