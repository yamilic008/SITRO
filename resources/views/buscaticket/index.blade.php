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
           <!--  <center><img src="{{asset('images/logo.png')}}" ></center> <br> -->
            <a href="/"><b>Busca tu ticket</b></a>
        </div>
        <div class="card">
            <div class="body">
                <form  method="POST" action="{{ route('buscart') }}">
                  {{ csrf_field() }}{{method_field('PUT')}}
                    <div class="msg">Introduce el folio de tu ticket</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" >local_activity</i>
                        </span>
                        <div class="form-line">
                           <input  type="number" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="ticket"  required autofocus placeholder="# de ticket">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- <button class="btn btn-block bg-pink waves-effect" type="submit">LOGGIN</button> -->
                         <button type="submit" class="btn btn-block btn-success waves-effect ">Buscar</button>

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
    @include('sweetalert::alert') 
     <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</body>

</html>






