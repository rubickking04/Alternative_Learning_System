@extends('student.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-11">
            <div class="row">
                <div class="col-lg-8 col-12 mb-4">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="row border-bottom border-2 border-primary">
                                <div class="col-lg-1 col-md-2 col-sm-2 col-2 ">
                                    <img class="rounded-circle border border-info border-3 mt-3" src="{{asset('/storage/images/avatar.png')}}" height="60" width="60">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-10 mb-2">
                                    <div class="text-start fs-4 fw-bold card-title">{{ $title }}</div>
                                    <p class="small text-muted lh-sm">{{ $teacher_name.' • '. \Carbon\Carbon::parse($created_at)->format('h:i a') }}</p>
                                    <p class="small text-muted lh-sm">{{ $score.' points' }}</p>
                                </div>
                            </div>
                            <div class="row ">
                                <p class="mt-3">{{ $instruction }}</p>
                                <p class="">{{ __('Attachments:') }}</p>
                                @isset($link)
                                    <a href="{{ $link }}" target="_blank" class="text-decoration-none mb-5">{{ $link }}</a>
                                    @else
                                    <p>No link</p>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block mt-5 py-5">
                    <div class="card shadow ">
                        <div class="card-body">
                            <div class="container mb-3">
                                <div class="card-title fs-4">{{ __('Your work') }}</div>
                                @if(\App\Models\Answer::with('answer')->where('user_id', Auth::user()->id)->where('quiz_id', $quiz_id)->exists())
                                    <button class="btn btn-outline-secondary col-12">{{ __('Unsubmit') }}</button>
                                @else
                                <form action="{{ route('student.quizzes.answer') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="subject_id" value="{{ $sub_id }}">
                                    <input type="hidden" name="quiz_id" value="{{ $quiz_id }}">
                                    <input type="hidden" name="title" value="{{ 'Done' }}">
                                    <button type="submit" class="btn btn-primary col-12 mb-2">{{ __('Mark as Done') }}</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border-bottom border-2 border-primary mt-4">
                <div class="col-lg-6 col-6">
                    <div class="text-start fs-4 fw-bold card-title">{{ __('Submitted') }}</div>
                </div>
                <div class="col-lg-6 col-6">
                    <div class="text-end fs-6 py-2 fw-bold card-title">{{ $quiz->count() }}{{ Str::plural(' student',$quiz->count()) }}</div>
                </div>
            </div>
            @if (count($quiz)>0)
            <div class="table-responsive py-2">
                <table class="w3-table ">
                    <tbody>
                        @foreach ( $quiz as $lessons )
                            <tr>
                                <td  class="text-end py-2 " scope="row">
                                    <img src="{{ asset('/storage/images/avatar.png')}}" alt="..." width="30" height="30" class="rounded-circle image">
                                </td>
                                <td  class="text-dark text-start text-wrap fw-bold col-lg-12 col-12 px-2 py-3" scope="row">
                                    <a href="#" class="text-dark text-decoration-none " data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $lessons->id }}">{{ $lessons->students->name }} </a>
                                    @if (empty($lessons->hasGrade))
                                        <span class="text-muted px-1">{{ __(' ') }}</span>
                                    @else
                                        <span class="text-muted px-1"><i class="fa-solid fa-check fs-5"></i></span>
                                    @endif
                                </td>
                                <td class="text-end " scope="row">
                                    <a href="#" class="btn btn-outline-primary border-0 fs-5 rounded-circle text-end" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                    <ul class="dropdown-menu " aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li><a class="dropdown-item " href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $lessons->id }}"><i class="fa-solid fa-eye px-1"></i>{{ __('View Grade') }}</a></li>
                                    </ul>
                                    <div class="modal fade modal-alert" id="exampleModalCenter{{ $lessons->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content shadow" style="border-radius:20px;">
                                                <div class="modal-body p-4 text-center">
                                                    <div class="row">
                                                        <div class="thumb-lg member-thumb ms-auto mb-1">
                                                            <img src="{{ asset('/storage/images/avatar.png')}}" class="border border-info border-5 rounded-circle img-thumbnail" alt="" height="100px" width="100px">
                                                        </div>
                                                        <h2 class="fw-bold mb-4 mt-3">{{ $lessons->students->name }}</h2>
                                                        <form action="">
                                                                <div class="form-outline mb-3 text-center">
                                                                    <label for="score" class=" h4">{{ __('Score: '.$lessons->score.'/'. $lessons->quizzes->score) }}</label>
                                                                    <input type="hidden" id="score" value="{{ $lessons->score.' / '. $lessons->quizzes->score}}" name="score" class="form-control @error('score') border-danger is-invalid @enderror" readonly />
                                                                    @error('score')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                        </form>
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
                <h4>{{ __('No submitions yet.') }}</h4>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
