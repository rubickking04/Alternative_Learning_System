@extends('student.layouts.class')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 mb-3">
            <div class="card" style="border-radius: 20px">
                <div class="">
                    <div class="card-body">
                        <div class="card-title">
                            <p class=" text-primary fw-bold h3 d-none d-sm-block">{{ $subject.' - '.$description }}</p>
                            <p class=" text-primary fw-bold h5 d-block d-sm-none">{{ $subject.' - '.$description }}</p>
                            <p class="fw-bold h5">{{ 'Section - '.$year.''.$section }}</p>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text bg-info d-none d-sm-block" id="basic-addon1">{{ __('Class code: ') }}</span>
                                        <input type="text" class="form-control  fw-bold font-monospace" id="myInput" value="{{ $uuid }}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-2">
                                    <button class="btn btn-success col-lg-3 col-sm-2 col-md-2 col-2" onclick="myFunctions()" {{ Popper::delay(500,0)->arrow('round')->pop('Copy to clipboard'); }}><i class="fs-5 text-center fa-solid fa-copy px-1"></i></button>
                                    <a href="{{ route('student.destroy', $id) }}" onclick="return confirm('Are you sure to unenroll to this subject?')" class="btn btn-danger col-lg-3 col-sm-2 col-md-2 col-2" {{ Popper::delay(500,0)->arrow('round')->pop('Unenroll'); }}><i class="fs-5 text-center fa-solid fa-trash-can px-1"></i></a>
                                </div>
                                @push('js')
                                    <script>
                                        function myFunctions() {
                                            const copyText = document.querySelector("#myInput");
                                                copyText.select();
                                                copyText.setSelectionRange(0, 99999); /* For mobile devices */
                                                navigator.clipboard.writeText(copyText.value);
                                                Toastify({
                                                    text: "Copied to clipboard",
                                                    className: "info",
                                                    position: "center",
                                                    gravity: "bottom",
                                                    duration: 1000,
                                                    style: {
                                                        background: "#3d3939",
                                                    }
                                                }).showToast();
                                            }
                                    </script>
                                    @endpush
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
                                <a href="{{ route('student.quizzes', $quizzes->id) }}" class="px-2 text-decoration-none text-dark d-none d-sm-block lh-sm mt-1">{{ __($less. ' posted a new assignment: '.$quizzes->title ) }}</a>
                                <a href="#" class="px-2 text-decoration-none text-dark small d-block d-sm-none lh-sm">{{ __($less. ' posted a new assignment:  '. $quizzes->title ) }}</a>
                                <p class=" px-2 small text-muted mt-4">{{ \Carbon\Carbon::createFromTimestamp(strtotime($quizzes->created_at))->isoFormat('MMM D, YYYY') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-lg-10 col-12 mb-2">
            <div class="card" style="border-radius: 10px">
                <div class="">
                    <div class="card-body">
                        <div class="text-center py-4">
                            <h4>{{ __('No Quizzes yet.') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
