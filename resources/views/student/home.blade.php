@extends('student.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row no-gutters">
        @if (count($class)>0)
        @foreach ( $class as $classes)
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
            <div class="card shadow h-100" style="border-radius:20px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8 col-lg-9 col-md-9 col-sm-9 col-9">
                            <a href="{{ route('student.class.home', $classes->uuid) }}" class="text-start d-block text-truncate h4 fw-bolder text-dark card-title">{{ $classes->description }}</a>
                            <h5 class="text-start fw-bold card-text " >{{ __($classes->yearLevel.' - ' .$classes->section) }}</h5>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="text-start card-text py-2">{{ $classes->teachers->name }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-3 col-md-3 col-sm-3 col-3 ">
                            <img src="{{ asset('/storage/images/avatar.png')}}" class="border border-info border-3 rounded-circle" alt="" height="60px" width="60px">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end px-3">
                        <div class="hstack gap-3">
                            <a href="#" onclick="return confirm('All the records here will be permantly deleted. Are you sure to unenroll to this subject? ')" class="text-danger text-end " ><i class="fa-solid fa-trash-can fs-3"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-lg-12 py-5">
            <div class="py-5">
                <h1 class="text-center" style="font-size: 100px">
                    <i class="bi bi-folder-x"></i>
                </h1>
                <div class="card-body">
                    <h5 class="card-title fs-2 text-center mb-3">{{ __('Add a class to get started.') }}</h5>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
