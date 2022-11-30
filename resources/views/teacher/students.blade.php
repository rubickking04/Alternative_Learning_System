@extends('teacher.layouts.class')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-10">
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
                                                <img src="{{ asset('/storage/images/avatar.png')}}" alt="..." width="30" height="30" class="rounded-circle">
                                            </td>
                                            <td  class="text-wrap fw-bold h6 py-3 px-2" scope="row">
                                                <a href="#" class="text-decoration-none">{{ Auth::user()->name }} </a>
                                                <span class="text-muted small">{{ __('(You)') }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row border-bottom border-2 border-primary mt-4">
                                <div class="col-lg-6 col-6">
                                    <div class="text-start fs-4 fw-bold card-title">{{ __('Students') }}</div>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <div class="text-end fs-6 py-2 fw-bold card-title">{{ $classs->count() }}{{ Str::plural(' student',$classs->count()) }}</div>
                                </div>
                            </div>
                            @if (count($classs)>0)
                            <div class="table-responsive py-2">
                                <table class="w3-table ">
                                    <tbody>
                                        @foreach ( $classs as $lessons )
                                            <tr>
                                                <td  class="text-end py-2 " scope="row">
                                                    <img src="{{ asset('/storage/images/avatar.png')}}" alt="..." width="30" height="30" class="rounded-circle image">
                                                </td>
                                                <td  class="text-dark text-start text-wrap fw-bold col-lg-12 col-12 px-2 py-3" scope="row">
                                                    <a href="#" class="text-dark text-decoration-none "  data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $lessons->id }}">{{ $lessons->student->name }} </a>
                                                </td>
                                                <td class="text-end " scope="row">
                                                    <a href="#" class="btn btn-outline-primary border-0 fs-5 rounded-circle text-end" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu " aria-labelledby="navbarDarkDropdownMenuLink">
                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $lessons->id }}"><i class="fa-solid fa-eye px-1"></i>{{ __('View') }}</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('teacher.delete.peoples', $lessons->id) }}" onclick="return confirm('AAre you sure to remove this student? ')"><i class="fa-solid fa-trash-can px-1"></i>{{ __('Remove') }}</a></li>
                                                    </ul>
                                                    <div class="modal fade modal-alert" id="exampleModalCenter{{ $lessons->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content shadow" style="border-radius:20px;">
                                                                <div class="modal-body p-4 text-center">
                                                                    <div class="row">
                                                                        <div class="thumb-lg member-thumb ms-auto">
                                                                            <img src="{{ asset('/storage/images/avatar.png')}}" class="border border-info border-5 rounded-circle img-thumbnail" alt="" height="100px" width="100px">
                                                                        </div>
                                                                        <h2 class="fw-bold mb-0">{{ $lessons->student->name }}</h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div class="text-center mt-5">
                                <h4>{{ __('No students yet.') }}</h4>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
