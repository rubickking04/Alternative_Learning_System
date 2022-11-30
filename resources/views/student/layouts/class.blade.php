<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/x-icon">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- PWA  -->
    <meta name="theme-color" content="#00000"/>
    <link rel="apple-touch-icon" href="{{ asset('storage/images/logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <!-- Fonts -->

    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="antialiased">
    @include('popper::assets')
    {{-- @include('sweetalert::alert') --}}
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid px-4">
                <a class="navbar-brand" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
                    <lord-icon
                    src="https://cdn.lordicon.com/wgwcqouc.json"
                    trigger="morph"
                    colors="primary:#000,secondary:#000"
                    stroke="60"
                    style="width:30px;height:30px"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvas">
                    </lord-icon>
                </a>
                {{-- <p class="navbar-brand mb-0 navbar-text fw-bold text-dark"><img class="align-top" src="{{ asset('/storage/images/logo.png') }}" height="45" width="45"></a></p> --}}
                <p class="navbar-brand mb-0 navbar-text fw-bold text-dark">{{ $subject.' - '.$year.''.$section }}</p>
                <!-- Center Of Navbar -->
                <ul class="navbar-nav me-5 mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active px-4 d-none text-uppercase d-md-block" href="{{ route('student.class.home', $uuid) }}">{{ __('Stream') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active px-4 d-none text-uppercase d-md-block" href="{{ route('student.class.peoples', $uuid) }}">{{ __('People') }}</a>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mt-1">
                        <a class="nav-link " href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fs-4 px-3 fa-solid fa-plus text-dark "></i>
                        </a>
                    </li>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Join Class') }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class=" row justify-content-center">
                                            <div class="col-lg-8 mb-2">
                                                <div class="card shadow" style="border-radius: 20px;">
                                                    <div class="card-body">
                                                        <div class="container-fluid">
                                                            <p class="text-muted font-monospace">{{ __('You\'re currently signed in as') }}</p>
                                                            <div class="row">
                                                                <div class="col-lg-1 col-md-1 col-sm-1 col-3 d-none d-sm-block">
                                                                    <img class="rounded-circle border border-info border-3" src="{{asset('/storage/images/avatar.png')}}" height="60" width="60">
                                                                </div>
                                                                <div class="col-lg-7 col-md-8 col-sm-8 ms-lg-3 col-12 mb-3">
                                                                    <p class="h4">{{ Auth::user()->name }}</p>
                                                                    <p class="fs-6">{{ Auth::user()->email }}</p>
                                                                </div>
                                                                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                                                        <a href="{{ route('student.logout') }}" class="btn btn-primary col-lg-12"
                                                                            onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();"
                                                                            style="border-radius:30px;">
                                                                            <span class=""><i class="fa-solid fa-right-from-bracket fs-6 px-1"></i>{{ __('Sign out') }}</span> </a>
                                                                    <form id="logout-form" action="{{ route('student.logout') }}" method="POST" class="d-none">
                                                                        @csrf
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 mb-3">
                                                <div class="card rounded-4 shadow" style="border-radius: 20px;">
                                                    <div class="card-body">
                                                        <div class="">
                                                            <p class="h3 ">{{ __('Class code') }}</p>
                                                            <div class="d-flex justify-content-start">
                                                                <p class=" fw-bold font-monospace">{{ __('• Ask your teacher for the unique class code, then enter it here.') }}</p>
                                                            </div>
                                                            <form action="{{ route('student.join_class') }}" method="POST">
                                                            @csrf
                                                                <div class="row g-2">
                                                                    <div class="col-lg-7 form-floating mb-2">
                                                                        <input name="uuid" type="text" class="form-control @error('uuid') is-invalid @enderror @if (session('msg'))      is-invalid @endif" id="floatingInput" placeholder="name@example.com">
                                                                        <label for="floatingInput">{{ __('Enter Unique Class Code Here') }}</label>
                                                                        @error('uuid')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                        @if (session('msg'))
                                                                            <span class="text-danger small" role="alert">
                                                                                <strong>{{ session('msg') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="container">
                                                    <p class="h5 fw-bold font-monospace">{{ __('To Sign-in with a class code: ') }}</p>
                                                    <p class="fs-6 px-3 font-monospace">{{ __('•  Use an authorized account') }}</p>
                                                    <p class="fs-6 px-3 font-monospace">{{ __('•  Use a class code with 36 letters or numbers') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">{{ __('Join Class') }}</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <li class="nav-item mt-1 d-none d-md-block">
                        <img src="{{ asset('/storage/images/avatar.png') }}" alt="" width="35" height="35" class="rounded-circle">
                    </li>
                </ul>
            </div>
        </nav>
        <nav class="navbar navbar-expand fixed-bottom navbar-light bg-white shadow-sm d-block d-sm-none " aria-label="Second navbar example">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarsExample02">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link active px-5" aria-current="page" href="{{ route('student.class.home', $uuid) }}">
                            <i class="fs-4 bi bi-chat-left-text-fill px-5 mt-2"></i>
                            <span class="px-1 text-uppercase">{{ __('Stream') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-5 active" href="{{ route('student.class.peoples', $uuid) }}">
                            <i class="fs-4 fa-solid fa-users px-5 mt-2"></i>
                            <span class="px-1 text-uppercase">{{ __('People') }}</span>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="offcanvas offcanvas-start w-auto container bg-light" tabindex="-1" id="offcanvas" data-bs-keyboard="true" data-bs-backdrop="true">
            <div class="offcanvas-header text-center">
                <h6 class="offcanvas-title" id="offcanvas">
                    <div class="text-center">
                        <a href="{{ url('/') }}" class=" text-decoration-none">
                            <img class="d-inline-block align-top rounded-circle" src="{{ asset('/storage/images/avatar.png') }}" height="90" width="90">
                        </a>
                    </div>
                    <span class="fs-5 fw-bold">{{ Auth::user()->name }}</span>
                    <a class="nav-link"><span class="text-info d-flex justify-content-center text-muted text-uppercase small">{{ __('Student\'s Name') }}</span>
                    </a>
                </h6>
            </div>
            <hr>
            <div class="offcanvas-body text-dark px-0 ">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start" id="menu">
                    <li class="nav-item">
                        <a class="nav-link"><span class="text-white text-muted text-uppercase small">{{ __('Navigation') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('student.home') }}" class="nav-link text-truncate text-dark">
                            <i class="fs-5 fa-solid fa-house-chimney text-dark"></i><span class="ms-3" aria-current="page">{{ __('Classes') }}</span>
                        </a>
                    </li>
                </ul>
                @if (count($class)>0)
                <hr>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start" id="menu">
                    <li class="nav-item">
                        <a class="nav-link"><span class="text-white text-muted text-uppercase small">{{ __('Enrolled') }}</span>
                        </a>
                    </li>
                    @foreach ( $class as $classes)
                    <li class="nav-item">
                        <a href="{{ route('student.class.home', $classes->uuid) }}" class="nav-link text-truncate text-dark">
                            <i class="fs-5 bi bi-menu-button-wide-fill text-dark"></i><span class="ms-3 text-truncate" aria-current="page">{{ __( $classes->subject. ' - ' .$classes->yearLevel.'' .$classes->section) }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif
                        <hr>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start" id="menu">
                            <li class="nav-item">
                                <a class="nav-link"><span class="text-white text-muted text-uppercase small">{{ __('Account') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-truncate text-dark">
                                    <i class="fa-solid fa-question fs-5 text-dark"></i><span class="ms-3 text-truncate" aria-current="page">{{ __('Help') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('student.logout') }}" class="nav-link text-truncate text-dark"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fs-5 "></i><span class="ms-2">{{ __('Log Out') }}</span>
                                </a>
                                <form id="logout-form" action="{{ route('student.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row py-2">
                <div class="col p-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @stack('js')
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
