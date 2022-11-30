<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/x-icon">
    <!-- PWA  -->
    <meta name="theme-color" content="#00000"/>
    <link rel="apple-touch-icon" href="{{ asset('storage/images/logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="antialiased" style="background-color: #eceff1">
    {{-- @include('sweetalert::alert') --}}
    <div id="app">
        <main class="py-5">
            @yield('content')
        </main>
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img class="align-top" src="{{ asset('/storage/images/logo.png') }}" height="60" width="60"></a>
                <p class="navbar-brand mb-0 navbar-text fw-bold text-dark">{{ __('Login') }}</p>
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item px-2">
                        <a class="nav-link " href="#"><i class="fa-solid fs-5 fa-circle-question"></i></a>
                    </li>
                </ul>
            </div>
        </nav> --}}
    </div>
    <script src="{{ asset('/sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
</body>
<script>
    function myFunction() {
        var x = document.getElementById("myInput1");
        var y = document.getElementById("myInput2");
            if (x.type === "password" && y.type === "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
    }
</script>

</html>
