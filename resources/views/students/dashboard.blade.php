<x-student>
    @if (session('success'))
        <div class="text-bg-success p-2 my-3 w-50">
            {{ session('success') }}
        </div>
    @endif
    <h3 class="text-center my-3">{{ auth('student')->user()->name }}'s Dashboard</h3>

    <div class="row">
        <div class="col-md-4">
            <div class="d-flex flex-column text-center">
                <i class="fa fa-user" style="font-size:12rem; color:black"></i>
                <div class="card text-center">
                    <div class="card-header">
                        <h5 class="card-title">
                        <strong>Name:</strong> {{ auth('student')->user()->name ?? '' }}
                        
                    </h5>
                    </div>
                    <div class="card-body text-start">
                        <p class="card-text">
                            <strong>Email:</strong> {{ auth('student')->user()->email ?? '' }}
                        </p>
                        <p class="card-text">
                            <strong>Phone:</strong> {{ auth('student')->user()->phone ?? '' }}
                        </p>
                        <p class="card-text">
                            <strong>Registration number:</strong> {{ auth('student')->user()->reg_no ?? '' }}
                        </p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-light w-100">Update Profile</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @if ($examinations->count() > 0)
                <h6 class="my-3 text-center">Upcoming examinations</h6>
                @foreach ($examinations as $examination)
                    <div class="card mx-auto mt-5" style="width: 35rem;">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="text-center">
                                {{ $examination['examinations']->exam_name }}
                            </h3>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-2">
                                        <h6>Status</h6>
                                    </div>
                                    <div class="col-10">
                                        {{ $examination['starts_in'] !== 'Already started'
                                            ? 'Starts in: ' . $examination['starts_in']
                                            : ($examination['ended'] === 'Not ended yet'
                                                ? 'Already started, Not ended yet'
                                                : 'Ended: ' . $examination['ended']) }}
                                    </div>
                                </div>
                            </li>

                            @if ($examination['can_take_exam'])
                                <li class="list-group-item text-center">
                                    {{-- <a href="" class="btn btn-sm btn-primary"></a> --}}
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                        Take Exam
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Are you ready to take the exam?
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Note that once started, students are not allowed to exit the examination page until they submit their responses. Are you ready to take your exam?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="" class="btn btn-primary">Proceed to exam</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif

                        </ul>
                    </div>
                @endforeach
            @else
                <h3 class="text-center">No you have no examination yet</h3>
            @endif
        </div>
    </div>
</x-student>
