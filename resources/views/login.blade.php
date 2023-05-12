@extends('layouts.skel')

@section('content')
    <!-- il wrapper è il contenitore che contiene il box della form di login -->
    <div class="wrapper">
        <!-- box che contiene la form di login -->
        <div class="form-box login">
            <h2>Login</h2>
            <!-- effettiva form di login -->
            <form action="" method="POST">
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

                <button type="submit" class="btn">Login</button>
                <div class="register">
                    <p>
                        Non hai un account?<b><a href="../html/signUp.html" class="register-link">Registrati</a></b>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection
