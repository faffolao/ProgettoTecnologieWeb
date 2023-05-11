@extends('layouts.skel')

@section('content')
    <!-- una hero image è un'area che viene particolarmente risaltata -->
    <div class="wrapper">
<!--            <span class="icon-close">-->
<!--                <ion-icon name="close"></ion-icon>-->
<!--            </span>-->
        <div class="form-box login">
            <h2>Login</h2>
<!--        <form action="#"-->
            <form>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" id="username" name="username" required>
                    <label for="username">Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-open"></ion-icon>
                    </span>
                    <input type="password" id="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <div class="rememberMe">
                    <label><input type="checkbox">Ricordami</label>
                </div>
<!--            <button type="submit class="btnLogin">Login</button>-->
                <button type="button" class="btnLogin" onclick="login()">Login</button>
                <div class="register">
                    <p>Non hai un account?<b><a href="../html/signUp.html" class="register-link">
                        Registrati</a></b>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/js/login.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/faq_viewer.js') }}"></script>
@endsection
