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

                {{ Form::label('data_nascita', 'Data di nascita', ['class' => 'label-input']) }}
                {{ Form::date('data_nascita', '', ['class' => 'input', 'id' => 'data_nascita', 'rules' => 'date_format:d-m-Y']) }}
                @if ($errors->first('cognome'))
                    <ul class="errors">
                        @foreach ($errors->get('data_nascita') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif

                {{ Form::label('sesso', 'Sesso') }}

                {{ Form::radio('sesso', 'maschio', true, ['style' => 'display:inline;']) }}
                {{ Form::label('sesso', 'Maschio', ['style' => 'display:inline;']) }}
                {{ Form::radio('sesso', 'femmina', false, ['style' => 'display:inline;']) }}
                {{ Form::label('sesso', 'Femmina', ['style' => 'display:inline;']) }}
                {{ Form::radio('sesso', 'altro', false, ['style' => 'display:inline;']) }}
                {{ Form::label('sesso', 'Altro', ['style' => 'display:inline;']) }}
                @if ($errors->first('sesso'))
                    <ul class="errors">
                        @foreach ($errors->get('sesso') as $message)
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

            <div style="clear:both;"></div>


                <div class="register">
                    <p>Hai già un account?<b><a href="{{ route('login') }}" class="register-link">
                                Effettua il Login</a></b>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
