<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{ config('app.name', 'Laravel')}}</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <!-- <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet"> -->

    <!-- Waves Effect Css -->
    <link href="{{ asset('css/node-waves/waves.css') }}" rel="stylesheet">
    <!-- <link href="../../plugins/node-waves/waves.css" rel="stylesheet" /> -->

    <!-- Animation Css -->
    <link href="{{ asset('css/animate-css/animate.css') }}" rel="stylesheet">
    <!-- <link href="../../plugins/animate-css/animate.css" rel="stylesheet" /> -->

    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

<body class="login-page" style="background-color: #009687">
    <div class="login-box">
        <div class="logo">
            <center><img src="{{asset('images/logo.png')}}" ></center> <br>
            <a href="/"><b>{{ config('app.name', 'Laravel')}}</b></a>
        </div>
        <div class="card">
            <div class="body">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <form method="POST" action="{{ route('password.email') }}" >
                    @csrf
                    <div class="msg">
                        Intrudice el correo con el que te registraste. Nosotros enviaremos un correo con tu usuario 
                        y un link para reiniciar tu contraseña.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Correo" required autofocus value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">REINICIAR PASWORD</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="{{ route('home') }}">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery/jquery.min.js') }}" defer></script>
    <!-- <script src="/scripts/jquery.min.js"></script> -->

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('js/bootstrap/bootstrap.js') }}" defer></script>
    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('js/node-waves/waves.js') }}" defer></script>
    <script src="{{ asset('js/jquery.validate.js') }}" defer></script>

    <!-- Validation Plugin Js -->

    <!-- Custom Js -->
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script src="{{ asset('js/sign-in.js') }}" defer></script>
    <!-- <script src="../../js/pages/examples/sign-in.js"></script> -->
</body>

</html>

