<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <script src="https://kit.fontawesome.com/d2e7cb981d.js" crossorigin="anonymous"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="antialiased" style="background-color: #eceff1">
    {{-- @include('sweetalert::alert') --}}
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button"><i class="bi bi-list fs-3 px-3"></i></a>
                <p class="navbar-brand mb-0 navbar-text fw-bold text-dark">{{ __('Administrator Dashboard') }}</p>
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item px-2">
                        {{-- <a class="nav-link " href="#"><i class="fa-solid fs-5 fa-circle-question"></i></a> --}}
                    </li>
                </ul>
            </div>
        </nav>
        <div class="offcanvas w-auto offcanvas-start text-center" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header text-center">
                <h6 class="offcanvas-title" id="offcanvas">
                    <div class="text-center">
                        <a href="{{ url('/') }}" class=" text-decoration-none">
                            <img class="d-inline-block align-top rounded-circle" src="{{ asset('/storage/images/avatar.png') }}" height="90" width="90">
                        </a>
                    </div>
                    <span class="fs-5 fw-bold">{{ Auth::user()->name }}</span>
                    <a class="nav-link"><span class="text-info d-flex justify-content-center text-muted text-uppercase small px-5">{{ __('Administrator\'s Name') }}</span>
                    </a>
                </h6>
            </div>
            <hr>
            <div class="offcanvas-body text-dark px-0 ">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start" id="menu">
                    <li class="nav-item">
                        <a class="nav-link"><span class="text-white text-muted text-uppercase small">{{ __('Interface') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.home') }}" class="nav-link text-truncate text-dark">
                            <i class="fs-5 bi bi-columns-gap px-1 text-dark fw-bold"></i><span class="ms-3" aria-current="page">{{ __('Dashboards') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link collapsed text-dark"  data-bs-toggle="collapse" data-bs-target="#table-collapse" role="button" aria-expanded="true" aria-controls="table-collapse">
                            <i class="fs-5 bi bi-layout-text-window-reverse px-1 text-dark"></i><span class="ms-3" >{{ __('Tables') }}</span>
                        </a>
                    </li>
                    <div class="collapse ms-3" id="table-collapse">
                        <ul class="btn-toggle-nav nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start list-unstyled fw-normal pb-2">
                            <li class="nav-item">
                                <a href="{{ route('admin.students') }}" class="ms-2 nav-link text-decoration-none rounded">
                                    <i class="fs-5 fa-solid fa-angles-right"></i>
                                    <span class="ms-2 text-dark">{{ __('Students Table ') }}
                                        <span class="badge text-bg-danger">{{ __('('.App\Models\User::all()->count().')') }}</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.teachers') }}" class="ms-2 nav-link text-decoration-none rounded">
                                    <i class="fs-5 fa-solid fa-angles-right"></i>
                                    <span class="ms-2 text-dark">{{ __('Teachers Table ') }}
                                        <span class="badge text-bg-danger">{{ __('('.App\Models\Teacher::all()->count().')') }}</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="ms-2 nav-link text-decoration-none rounded">
                                    <i class="fs-5 fa-solid fa-angles-right"></i>
                                    <span class="ms-2 text-dark">{{ __('Subjects Table ') }}
                                        <span class="badge text-bg-danger">{{ __('('.App\Models\TeacherClass::all()->count().')') }}</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </ul>
                <hr>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-auto mb-0 align-items-start" id="menu">
                    <li class="nav-item">
                        <a class="nav-link"><span class="text-white text-muted text-uppercase small">{{ __('Account') }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-truncate text-dark">
                            <i class="fa-solid fa-question px-1 fs-5 text-dark"></i><span class="ms-3 text-truncate" aria-current="page">{{ __('Help') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.logout') }}" class="nav-link text-truncate text-dark" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt px-1 fs-5 "></i><span class="ms-2">{{ __('Log Out') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script>
    function password_show_hide() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }

    function password_show_hides() {
        var x = document.getElementById("password-confirm");
        var show_eye = document.getElementById("show_eyes");
        var hide_eye = document.getElementById("hide_eyes");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
</script>

</html>
