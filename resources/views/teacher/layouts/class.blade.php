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
                        <a class="nav-link active px-4 d-none text-uppercase d-md-block" href="{{ route('teacher.class.home', $uuid) }}">{{ __('Stream') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active px-4 d-none text-uppercase d-md-block" href="{{ route('teacher.classworks', $uuid) }}">{{ __('Works') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active px-4 d-none text-uppercase d-md-block" href="{{ route('teacher.peoples', $uuid) }}">{{ __('People') }}</a>
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
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12">
                                                <div class="card-title fs-5 mb-3">{{ __('Create Class Subject') }}</div>
                                                <form action="{{ route('teacher.create.class') }}" method="POST">
                                                    @csrf
                                                    <div class="row g-2">
                                                        <div class="form-floating mb-2">
                                                            <input name="subject" type="text" class="form-control @error('subject') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                                                            <label for="floatingInput">{{ __('Subject Code') }}</label>
                                                            @error('subject')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-floating mb-2">
                                                            <input name="description" type="text" class="form-control @error('description') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                                                            <label for="floatingInput">{{ __('Subject Description') }}</label>
                                                            @error('description')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-floating mb-2">
                                                            <select name="yearLevel" class="form-select @error('yearLevel') is-invalid @enderror" id="floatingSelectGrid" aria-label="Floating label select example">
                                                                <option disabled selected>{{ __('Select year level') }}</option>
                                                                <option value="1">{{ __('1st year') }}</option>
                                                                <option value="2">{{ __('2nd year') }}</option>
                                                                <option value="3">{{ __('3rd year') }}</option>
                                                                <option value="4">{{ __('4th year') }}</option>
                                                            </select>
                                                            <label for="floatingSelectGrid">{{ __('Year') }}</label>
                                                            @error('yearLevel')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-floating mb-2">
                                                            <select name="section" class="form-select @error('section') is-invalid @enderror" id="floatingSelectGrid" aria-label="Floating label select example">
                                                                <option disabled selected>{{ __('Select section') }}</option>
                                                                <option value="A">{{ __('A') }}</option>
                                                                <option value="B">{{ __('B') }}</option>
                                                                <option value="C">{{ __('C') }}</option>
                                                                <option value="D">{{ __('D') }}</option>
                                                            </select>
                                                            <label for="floatingSelectGrid">{{ __('Section') }}</label>
                                                            @error('section')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class=" form-floating mb-2">
                                                            <select name="semester" type="text" class="form-select  @error('semester') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                                                                <option disabled selected>{{ __('Select semester') }}</option>
                                                                <option value="1">{{ __('1st Semester') }}</option>
                                                                <option value="2">{{ __('2nd Semester') }}</option>
                                                            </select>
                                                            <label for="floatingInput">{{ __('Semester') }}</label>
                                                            @error('semester')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">{{ __('Create Class') }}</button>
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
                        <a class="nav-link active px-3" aria-current="page" href="{{ route('teacher.class.home', $uuid) }}">
                            <i class="fs-4 bi bi-chat-left-text-fill px-3 mt-2"></i>
                            <span class="px-1 text-uppercase">{{ __('Stream') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 active" href="{{ route('teacher.classworks', $uuid) }}">
                            <i class="fs-4 fa-solid fa-clipboard-list px-3 mt-2"></i>
                            <span class="px-1 text-uppercase">{{ __('Works') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 active" href="{{ route('teacher.peoples', $uuid) }}">
                            <i class="fs-4 fa-solid fa-users px-3 mt-2"></i>
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
                    <span class="fs-5 fw-bold">{{ Auth::guard('teacher')->user()->name }}</span>
                    <a class="nav-link"><span class="text-info d-flex justify-content-center text-muted text-uppercase small">{{ __('Instructor\'s Name') }}</span>
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
                        <a href="{{ route('teacher.home') }}" class="nav-link text-truncate text-dark">
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
                        <a href="{{ route('teacher.class.home', $classes->uuid) }}" class="nav-link text-truncate text-dark">
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
                                <a href="{{ route('teacher.logout') }}" class="nav-link text-truncate text-dark"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fs-5 "></i><span class="ms-2">{{ __('Log Out') }}</span>
                                </a>
                                <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST" class="d-none">
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
