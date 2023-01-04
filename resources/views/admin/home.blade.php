@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-12 mt-3">
        <h4>{{  __('Newly Users')  }}</h4>
    </div>
    <div class="col-6">
        <div class="card" >
            <div class="card-body ">
                <h5 class="card-title mb-3">New Student</h5>
                <div class="table-responsive py-2 overflow-auto h-25">
                    <table>
                        <tbody>
                            @foreach ($user as $users)
                            <tr>
                                <td  class="text-end col-lg-1 col-md-1 col-sm-1 col-1 px-2" scope="row">
                                @if($users->image)
                                    <img src="{{ asset('/storage/images/'.$user->image)}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{ asset('/storage/images/avatar.png')}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                @endif
                                </td>
                                <td  class="text-start fw-bold h6 py-3 text-truncate" scope="row">{{ $users->name }}</td>
                                <td  class="text-end text-muted small fw-bold h6 py-3 text-truncate" scope="row">{{ $users->created_at->diffForhumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('admin.students') }}" class="btn btn-primary">{{ __('View all ddata') }}</a>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card" >
            {{-- <img src="..." class="card-img-top" alt="..."> --}}
            <div class="card-body">
                <h5 class="card-title">New Teacher</h5>
                <div class="table-responsive py-2 overflow-auto h-25">
                    <table>
                        <tbody>
                            @foreach ($teacher as $users)
                            <tr>
                                <td  class="text-end col-lg-1 col-md-1 col-sm-1 col-1 px-2" scope="row">
                                @if($users->image)
                                    <img src="{{ asset('/storage/images/'.$user->image)}}" class="img-fluid" alt="">
                                @else
                                    <img src="{{ asset('/storage/images/avatar.png')}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                @endif
                                </td>
                                <td  class="text-start fw-bold h6 py-3 text-truncate" scope="row">{{ $users->name }}</td>
                                <td  class="text-end text-muted small fw-bold h6 py-3 text-truncate" scope="row">{{ $users->created_at->diffForhumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('admin.teachers') }}" class="btn btn-primary">{{ __('View all') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
