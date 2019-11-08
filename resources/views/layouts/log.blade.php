<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{ config('app.name', 'Laravel')}}</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
     <link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet">
    @yield('css')

<body class="theme-teal" style="background-color: #009687">
    
    @yield('content')

    <script src="{{ asset('js/app.js') }}" ></script>
    <!-- Jquery Core Js -->
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
