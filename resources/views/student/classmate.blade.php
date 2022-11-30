@extends('student.layouts.class')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-10">
            {{-- <div class="card shadow" style="border-radius: 20px"> --}}
                <div class="">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 col-11">
                            <div class="card-body">
                                <div class="card-title">
                                    <div class="row border-bottom border-2 border-primary">
                                        <div class="col-lg-6 col-6">
                                            <div class="text-start fs-4 fw-bold card-title">{{ __('Teacher') }}</div>
                                        </div>
                                    </div>
                                    <div class="table-responsive py-2 mb-1">
                                        <table class="w3-table ">
                                            <tbody>
                                                <tr>
                                                    <td  class="text-end py-2 col-lg-1" scope="row">
                                                        @if($teach)
                                                            <img src="{{ asset('/storage/images/'.$teach)}}" class="rounded-circle" alt="" width="30" height="30">
                                                        @else
                                                            <img src="{{ asset('/storage/images/avatar.png')}}" alt="..." width="30" height="30" class="rounded-circle">
                                                        @endif
                                                    </td>
                                                    <td  class="text-wrap fw-bold h6 py-3 px-2" scope="row"><a href="#" class="text-dark text-decoration-none">{{ $less }} </a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row border-bottom border-2 border-primary mt-4">
                                        <div class="col-lg-6 col-6">
                                            <div class="text-start fs-4 fw-bold card-title">{{ __('Classmates') }}</div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <div class="text-end fs-6 py-2 fw-bold card-title">{{ $classs->count() }}{{ Str::plural(' student',$classs->count()) }}</div>
                                        </div>
                                    </div>
                                    <div class="table-responsive py-2">
                                        <table class="w3-table ">
                                            <tbody>
                                                @foreach ( $classs as $lessons )
                                                    <tr>
                                                        <td  class="text-end py-2 col-lg-1" scope="row">
                                                            @if($lessons->student->image)
                                                                <img src="{{ asset('/storage/images/'.$lessons->student->image)}}" class="rounded-circle image" alt="" width="30" height="30">
                                                            @else
                                                                <img src="{{ asset('/storage/images/avatar.png')}}" alt="..." width="30" height="30" class="rounded-circle image">
                                                            @endif
                                                        </td>
                                                        @if(empty($lessons->user_id === Auth::user()->id))
                                                            <td  class="text-dark text-start text-wrap fw-bold px-2 py-3" scope="row"><a href="#" class="text-dark text-decoration-none">{{ $lessons->student->name }} </a>
                                                            </td>
                                                        @else
                                                            <td  class="text-dark text-wrap fw-bold px-2 py-3" scope="row"><a href="#" class=" text-decoration-none">{{ $lessons->student->name }} </a>
                                                                <span class="text-muted small">
                                                                    {{ __('(You)') }}
                                                                </span>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
