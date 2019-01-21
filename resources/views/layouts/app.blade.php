<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
<!-- <link rel="stylesheet" href="{{asset('css/css/bootstrap.min.css')}}" type="text/css" /> -->
    <link rel="stylesheet" href="{{asset('css/css/buttons/bootstrap.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/profiles.css')}}" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/register.css')}}" type="text/css"/>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <header>
        <nav class="navbar navbar-light navbar-expand-md" id="AppNavBar">

            <div class="container-fluid" id="logBar">
                <a href="/">
                <div class="logo"></div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuBar">
                <span>
                    <i class="material-icons">menu</i>
                </span>
                 </button>
                    <div class="collapse navbar-collapse" id="menuBar">
                        <a href="../../login/">
                        <button type="button" class="btn white-button">Zaloguj się</button>
                        </a>
                        <a href="../../register/">
                        <button onclick="location.href='/register'" type="button" class="btn blue-button">Zarejerstruj się</button>
                        </a>
                    </div>
            </div>

            <!-- <select>
                <option value="" selected="selected">Wybierz</option>
                <option value="/login">Zaloguj się</option>
                <option value="/register">Zarejerstruj się</option>
            </select>  -->
        </nav>
    </header>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
