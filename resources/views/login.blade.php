@extends('layouts.skel')

@section('title', 'Login')

@section('content')
    <!-- il wrapper è il contenitore che contiene il box della form di login -->
    <div class="wrapper wrapper-login">
        <!-- box che contiene la form di login -->
        <div class="form-box login">
            <h2>Login</h2>
            <!-- effettiva form di login -->
            {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    {{ Form::label('username', 'Username', ['class' => 'label-input']) }}
                    {{ Form::text('username', '', ['class' => 'input','id' => 'username']) }}
                    @if ($errors->first('username'))
                        <ul class="errors">
                            @foreach ($errors->get('username') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-open"></ion-icon>
                    </span>
                    {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
                    {{ Form::password('password', ['class' => 'input', 'id' => 'password']) }}
                    @if ($errors->first('password'))
                        <ul class="errors">
                            @foreach ($errors->get('password') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

            <div class="container-form-btn">
                {{ Form::submit('Login', ['class' => 'btn']) }}
            </div>

                <div class="register">
                    <p>
                        Non hai un account?&nbsp;&nbsp;<b><a href="{{ route('registrazione') }}" class="register-link">Registrati</a></b>
                    </p>
                </div>
            {{ Form::close() }}
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection
