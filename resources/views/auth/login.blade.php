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
                <form id="sign_in" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="msg">Introduce las credenciales</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                           <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Correo">
                        </div>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback " role="alert">
                                        <p class="font-italic col-pink">{{ $errors->first('email') }}</p>
                                    </span>

                                @endif
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                        </div>
                        <div class="col-xs-4">
                            <!-- <button class="btn btn-block bg-pink waves-effect" type="submit">LOGGIN</button> -->
                         <button type="submit" class="btn btn-block btn-primary waves-effect">
                                    {{ __('Login') }}
                                </button>

                        </div>
                               
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <!-- <a href="sign-up.html">Register Now!</a> -->
                        </div>
                        <div class="col-xs-6 align-right">
                             @if (Route::has('password.request'))
                                    <a class="btn btn-link " href="{{ route('password.request') }}">
                                        {{ __('Olvidaste tu Password?') }}
                                    </a>
                                @endif
                        </div>
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
