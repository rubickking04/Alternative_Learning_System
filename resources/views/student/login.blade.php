@extends('student.layouts.login')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5">
            <div class="py-3">
                <div class="text-center mb-5">
                    <img class="align-top" src="{{ asset('/storage/images/logo.png') }}" height="150" width="150"></a>
                </div>
                <hr>
                <h3 class="text-center py-4 fw-bold text-uppercase" style="letter-spacing: 3px">{{ __('Login Account') }}</h3>
                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-outline mb-2 text-start">
                            <label for="email" class="fs-4 col-form-label">Email</label>
                            <input type="email" id="email" placeholder="Email" name="email" class="form-control form-control-lg border-primary @error('email') border-danger is-invalid @enderror" value="{{ old('email') }}"/>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-4  text-start">
                            <label for="password" class="fs-4 col-form-label">{{ __('Password') }}</label>
                            <input id="myInput1" type="password" placeholder="Password" class="form-control form-control-lg border-primary @error('password') border-danger is-invalid @enderror" name="password" />
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
                                <button type="submit" class="btn btn-primary fs-5 px-5 text-uppercase">{{ __('Login') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="text-center">
                    <p>Not a member yet? <a href="{{ route('student.register') }}">{{ __('Sign up') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
