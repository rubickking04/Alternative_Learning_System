@extends('teacher.layouts.class')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-10">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-12 mb-4">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="row border-bottom border-2 border-primary">
                                <div class="col-lg-6 col-6 mb-2">
                                    <div class="text-start fs-4 fw-bold card-title">{{ __('Classworks') }}</div>
                                </div>
                                <div class="col-lg-6 col-6 text-end mb-2">
                                    <div class="text-end btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModals" style="border-radius:20px;"><i class="fa-solid me-2 fa-plus"></i>{{ __('Create Quiz') }}</div>
                                    <div class="modal fade" id="exampleModals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-fullscreen">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Create a Quiz') }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class=" row justify-content-center">
                                                            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 col-12 mb-2">
                                                                <div class="card shadow" style="border-radius: 20px;">
                                                                    <div class="card-body">
                                                                        <div class="container-fluid">
                                                                            <div class="card-title text-start h4 mb-3">{{ __('Add a Quiz') }}</div>
                                                                            <form action="{{ route('teacher.add.classworks', $uuid) }}" method="POST" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="row g-2">
                                                                                    {{-- <input name="subject_id" type="hidden" class="form-control" value="{{ $ids }}"> --}}
                                                                                    <div class="form-floating col-6 mb-2">
                                                                                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                                                                                        <label for="floatingInput">{{ __('Quiz Title') }}</label>
                                                                                        @error('title')
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="form-floating col-6 mb-2">
                                                                                        <input name="score" type="text" class="form-control @error('score') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                                                                                        <label for="floatingInput">{{ __('Quiz Items') }}</label>
                                                                                        @error('score')
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="form-floating mb-2">
                                                                                        <textarea name="instruction" type="text" class="form-control @error('instruction') is-invalid @enderror" placeholder="name@example.com" value="Write something" id="floatingTextarea2" style="height: 100px"></textarea>
                                                                                        <label for="floatingTextarea2">{{ __('Quiz Instruction') }}</label>
                                                                                        @error('instruction')
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="form-outline text-start">
                                                                                        <label for="file" class="form-label">{{ __('Attach alink: ') }}</label>
                                                                                    </div>
                                                                                    <div class="form-outline  text-start ">
                                                                                        <label for="file" class="form-label">{{ __('Link') }}</label>
                                                                                        <input name="url" type="url" id="url" placeholder="https://example.com" pattern="https://.*"  class="form-control @error('url') is-invalid @enderror"/>
                                                                                        @error('url')
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="text-start mt-3">
                                                                                        <button type="submit" class="btn btn-primary">{{ __('Assign') }}</button>
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ( count($quiz)>0)
                @foreach ( $quiz as $quizzes)
                <div class="col-lg-10 col-12 mb-2">
                    <div class="card" style="border-radius: 10px">
                        <div class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-1 col-lg-2 col-md-2 col-sm-3 col-2 text-end">
                                        <img class="rounded-circle border border-info border-3 mt-2" src="{{asset('/storage/images/avatar.png')}}" height="50" width="50">
                                    </div>
                                    <div class="col-xl-10 col-lg-8 col-md-8 col-sm-7 col-8">
                                        <a href="{{ url('/teacher/quiz/'.$quizzes->id) }}" class="px-2 text-decoration-none text-dark d-none d-sm-block lh-sm mt-1">{{ __($less. ' posted a new assignment: '.$quizzes->title ) }}</a>
                                        <a href="{{ url('/teacher/quiz/'.$quizzes->id) }}" class="px-2 text-decoration-none text-dark small d-block d-sm-none lh-sm">{{ __($less. ' posted a new assignment:  '. $quizzes->title ) }}</a>
                                        <p class=" px-2 small text-muted mt-4">{{ \Carbon\Carbon::createFromTimestamp(strtotime($quizzes->created_at))->isoFormat('MMM D, YYYY') }}</p>
                                    </div>
                                    <div class="col-xl-1 col-lg-2 col-md-2 col-sm-2 col-2 text-end">
                                        <a href="#" class="btn btn-outline-primary border-0 fs-5 rounded-circle text-end" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                        <ul class="dropdown-menu " aria-labelledby="navbarDarkDropdownMenuLink">
                                            <li><a class="dropdown-item" href="{{ route('teacher.delete.classworks',$quizzes->id ) }}" onclick="return confirm('All the records here will be permantly deleted. Are you sure to remove this quiz? ')" ><i class="fa-solid fa-trash-can px-1"></i>{{ __('Remove') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="text-center">
                    <h4>{{ __('No works yet.') }}</h4>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
