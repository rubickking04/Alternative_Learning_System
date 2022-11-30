@extends('teacher.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-10">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-12 mb-4">
                    <div class="row border-bottom border-2 border-primary mt-4">
                        <div class="col-lg-6 col-6">
                            <div class="text-start fs-4 fw-bold card-title">{{ __('Turned in') }}</div>
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
                                            <a href="#" class="text-dark text-decoration-none " data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $lessons->id }}">{{ $lessons->student->name }} </a>
                                            @if (empty($lessons->hasGrade))
                                                <span class="text-muted px-1">{{ __(' ') }}</span>
                                            @else
                                                <span class="text-muted px-1"><i class="fa-solid fa-check fs-5"></i></span>
                                            @endif
                                        </td>
                                        <td class="text-end " scope="row">
                                            <a href="#" class="btn btn-outline-primary border-0 fs-5 rounded-circle text-end" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                            <ul class="dropdown-menu " aria-labelledby="navbarDarkDropdownMenuLink">
                                                @if (\App\Models\Grade::where('subject_id', $sub_id)->where('quiz_id', $id)->where('user_id', $lessons->student->id)->exists())
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $lessons->id }}"><i class="fa-solid fa-eye px-1"></i>{{ __('View Grade') }}</a></li>
                                                <li><a class="dropdown-item" href="{{ route('teacher.delete.peoples', $lessons->id) }}" onclick="return confirm('AAre you sure to remove this student? ')"><i class="fa-solid fa-trash-can px-2"></i>{{ __('Remove') }}</a></li>
                                                @else
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $lessons->id }}"><i class="fa-solid fa-pen-clip px-2"></i>{{ __('Grade') }}</a></li>
                                                <li><a class="dropdown-item" href="{{ route('teacher.delete.peoples', $lessons->id) }}" onclick="return confirm('AAre you sure to remove this student? ')"><i class="fa-solid fa-trash-can px-2"></i>{{ __('Remove') }}</a></li>
                                                @endif
                                            </ul>
                                            <div class="modal fade modal-alert" id="exampleModalCenter{{ $lessons->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content shadow" style="border-radius:20px;">
                                                        <div class="modal-body p-4 text-center">
                                                            <div class="row">
                                                                <div class="thumb-lg member-thumb ms-auto mb-1">
                                                                    <img src="{{ asset('/storage/images/avatar.png')}}" class="border border-info border-5 rounded-circle img-thumbnail" alt="" height="100px" width="100px">
                                                                </div>
                                                                <h2 class="fw-bold mb-4 mt-3">{{ $lessons->student->name }}</h2>
                                                                @if (empty($lessons->hasGrade))
                                                                <form action="{{ route('teacher.quizzes.grade', $lessons->student->id) }}" method="POST">
                                                                    @csrf
                                                                    <div class="form-outline mb-3 text-start">
                                                                        <label for="score" class="col-form-label">{{ __('Upload Score: /'. $score) }}</label>
                                                                        <input type="hidden" name="subject_id" value="{{ $sub_id }}"/>
                                                                        <input type="hidden" name="answer_id" value="{{ $lessons->id }}"/>
                                                                        <input type="hidden" name="quiz_id" value="{{ $id }}"/>
                                                                        <input type="number" id="score" placeholder="{{ '/'.$score }}" name="score" class="form-control @error('score') border-danger is-invalid @enderror"/>
                                                                        @error('score')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary col-3">{{ __('Upload') }}</button>
                                                                    <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                                </form>
                                                                @else
                                                                <form action="">
                                                                        <div class="form-outline mb-3 text-center">
                                                                            <label for="score" class="col-form-label h3">{{ __('Score: '.$lessons->hasGrade->score.'/'. $score) }}</label>
                                                                            <input type="hidden" name="subject_id" value="{{ $sub_id }}"/>
                                                                            <input type="hidden" name="answer_id" value="{{ $lessons->id }}"/>
                                                                            <input type="hidden" name="quiz_id" value="{{ $id }}"/>
                                                                            <input type="hidden" id="score" value="{{ $lessons->hasGrade->score.' / '.$score }}" name="score" class="form-control @error('score') border-danger is-invalid @enderror" readonly />
                                                                            @error('score')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                        <button type="button" class="btn btn-danger col-3" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                                </form>
                                                                @endif
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
@endsection
