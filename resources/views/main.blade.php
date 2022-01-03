<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }} " async defer></script>
</head>

<header class="top-bar d-flex mb-3">
    <i class="fas fa-bars d-flex align-items-center pl-3" onclick="openNav()"></i>
    <img class="img-fluid mx-auto d-block" src="{{ asset('img/logo.png') }}" alt="">
    <i class="fas fa-user d-flex align-items-center pr-3"></i>
</header>
@section('body')
    <body>
    <div id="app">
        <div class="container">
            @show
            @yield('content')
        </div>
    </div>
    </body>

    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-arrow-left"></i></a>
        <div class="overlay-content">
            <p>This is a full screen menu</p>
            <p>Close me from the upper "Back Arrow"</p>
        </div>
    </div>
    <script>
        function openNav() {
            document.getElementById("myNav").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
        }
    </script>
</html>
