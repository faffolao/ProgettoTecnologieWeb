@extends('layouts.skel')

@section('title', 'Registrazione')

@section('content')
    <!-- il wrapper è il contenitore che contiene il box della form di login -->
    <div class="wrapper wrapper-register">
        <!-- box che contiene la form di login -->
        <div class="form-box form-box-inputdialog login">
            <h2>Registrazione</h2>

            <!-- effettiva form di input -->
            {{ Form::open(array('route' => 'registrazione', 'class' => 'contact-form')) }}
            <div class="form-row">
                <div class="form-left">
                {{ Form::label('nome', 'Nome', ['class' => 'label-input']) }}
                {{ Form::text('nome', '', ['class' => 'input', 'id' => 'nome']) }}
                @if ($errors->first('nome'))
                    <ul class="errors">
                        @foreach ($errors->get('nome') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                {{ Form::label('cognome', 'Cognome', ['class' => 'label-input']) }}
                {{ Form::text('cognome', '', ['class' => 'input', 'id' => 'cognome']) }}
                @if ($errors->first('cognome'))
                    <ul class="errors">
                        @foreach ($errors->get('cognome') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                {{ Form::label('eta', 'Data di nascita', ['class' => 'label-input']) }}
                {{ Form::date('eta', '', ['class' => 'input', 'id' => 'eta', 'rules' => 'date_format:d-m-Y']) }}
                @if ($errors->first('cognome'))
                    <ul class="errors">
                        @foreach ($errors->get('data_nascita') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                {{ Form::label('genere', 'Genere') }}

                {{ Form::radio('genere', 'maschio', true, ['style' => 'display:inline;']) }}
                {{ Form::label('genere', 'Maschio', ['style' => 'display:inline;']) }}
                {{ Form::radio('genere', 'femmina', false, ['style' => 'display:inline;']) }}
                {{ Form::label('genere', 'Femmina', ['style' => 'display:inline;']) }}
                {{ Form::radio('genere', 'altro', false, ['style' => 'display:inline;']) }}
                {{ Form::label('genere', 'Altro', ['style' => 'display:inline;']) }}
                @if ($errors->first('genere'))
                    <ul class="errors">
                        @foreach ($errors->get('genere') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                {{ Form::label('telefono', 'Numero di telefono', ['class' => 'label-input']) }}
                {{ Form::text('telefono', '', ['class' => 'input', 'id' => 'telefono', 'rules' => 'phone']) }}
                @if ($errors->first('telefono'))
                    <ul class="errors">
                        @foreach ($errors->get('telefono') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                {{ Form::label('email', 'Email', ['class' => 'label-input']) }}
                {{ Form::text('email', '', ['class' => 'input', 'id' => 'email', 'rules' => 'email']) }}
                @if ($errors->first('email'))
                    <ul class="errors">
                        @foreach ($errors->get('email') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
                </div>

                <div class="form-right">
                {{ Form::label('username','Username' ) }}
                {{ Form::text('username') }}
                @if ($errors->first('username'))
                    <ul class="errors">
                        @foreach ($errors->get('username') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                {{ Form::label('password', 'Password') }}
                {{ Form::password('password') }}
                @if ($errors->first('password'))
                    <ul class="errors">
                        @foreach ($errors->get('password') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
                </div>
            </div>

            {{ Form::submit('Registrazione', ['class' => 'btn'])}}

            {{ Form::close() }}

            <div class="register">
                <p>Hai già un account?<b><a href="{{ route('login') }}" class="register-link">
                            Effettua il Login</a></b>
                </p>
            </div>
        </div>
    </div>
@endsection
