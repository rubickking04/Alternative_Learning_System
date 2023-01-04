@extends('admin\layouts\login')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <div class="text-center py-3">
                        <img class="align-top" src="{{ asset('/storage/images/logo.png') }}" height="150" width="150"></a>
                    </div>
                    <h3 class="text-center card-title py-4 fw-bold text-uppercase" style="letter-spacing: 3px">{{ __('Admin Login') }}</h3>
                    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <strong>{{ __('This is only for Administrators') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('auth.admin.login') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-outline mb-2 text-start">
                                <label for="email" class="fs-4 col-form-label">Email</label>
                                <input type="email" id="email" placeholder="Email" name="email" class="form-control rounded-5 border-primary @error('email') border-danger is-invalid @enderror" value="{{ old('email') }}"/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline mb-4  text-start">
                                <label for="password" class="fs-4 col-form-label">{{ __('Password') }}</label>
                                <input id="myInput1" type="password" placeholder="Password" class="form-control rounded-5  border-primary @error('password') border-danger is-invalid @enderror" name="password" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="myFunction();">
                                <label class="form-check-label" for="flexCheckDefault">{{ __('Show Password') }}</label>
                            </div>
                            <div class="row py-4">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary rounded-5 fs-5 px-5 text-uppercase">{{ __('Login') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
