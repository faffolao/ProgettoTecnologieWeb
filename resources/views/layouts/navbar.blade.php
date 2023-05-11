<nav>
    <!-- area di sinistra: contiene titolo e logo di Offertopoli -->
    <div class="navbar-logo-container">
        <img src="{{ asset('assets/images/website_logo.png') }}" class="navbar-logo" alt="Logo Offertopoli">
        <h1 class="navbar-title">Offertopoli</h1>
    </div>

    <!-- area di destra: contiene i link che indirizzano alle pagine del sito web  -->
    <div class="navbar-links-container">
        <ul>
            <li><a href="{{ route('homepage') }}"><b>Home</b></a></li>
            <li><a href="">Aziende</a></li>
            <li><a href="catalogo.html">Catalogo</a></li>
            <li><a href="login.html">Login</a></li>
        </ul>
    </div>
</nav>
