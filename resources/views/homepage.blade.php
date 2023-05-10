@extends('layouts.skel')

@section('content')
    <div class="hero-image">
        <h1>Scontati ma non scontrosi: il momento perfetto per togliersi qualche sfizio</h1>
        <p>Promozioni da tantissime aziende</p>
        <a class="btn" href="">Inizia a sfogliare il catalogo</a>
    </div>
    <div class="container">
        <h2>Chi siamo e cosa facciamo</h2>
        <div class="desc">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed placerat dapibus eros, ac facilisis neque fermentum et.</p>
        </div>
        <h2>Aziende associate</h2>
        <div class="services">
            <div class="service" onclick="openPage()">
                <img src="{{ asset('assets/images/logo_adidas.png') }}" alt="Service Image" class="logo-azienda">
                <h3>Adidas</h3>
                <!--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed placerat dapibus eros, ac facilisis neque fermentum et.</p>-->
            </div>
            <div class="service" onclick="openPage()">
                <img src="https://via.placeholder.com/150" alt="Service Image">
                <h3>Azienda 2</h3>
                <!--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed placerat dapibus eros, ac facilisis neque fermentum et.</p>-->
            </div>
            <div class="service" onclick="openPage()">
                <img src="https://via.placeholder.com/150" alt="Service Image">
                <h3>Azienda 3</h3>
                <!--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed placerat dapibus eros, ac facilisis neque fermentum et.</p>-->
            </div>
        </div>
        <h2>F.A.Q.</h2>
        <div class="desc">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed placerat dapibus eros, ac facilisis neque fermentum et.</p>
            <a class="btn" href="{{ route('homepage') }}">Scopri le domande più frequenti</button></a>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/js/homepage.js') }}"></script>
@endsection
