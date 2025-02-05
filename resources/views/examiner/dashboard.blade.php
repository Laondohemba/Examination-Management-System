<x-examiner>

    @if (session('success'))
        <div class="text-bg-success p-2 w-50 my-2 mx-auto">
            {{session('success')}}
        </div>
    @endif
    <h3 class="text-center my-2">{{ucwords(auth()->user()->username)}}, welcome to Examiner</h3>
    <x-examinerdashboard></x-examinerdashboard>

    @if ($examDetails->count() > 0)
    <h3 class="text-center my-3">Your recent examinations</h3>
    @foreach ($examDetails as $examination)
        <div class="card mx-auto my-3" style="width: 40rem;">
            <div class="card-header d-flex justify-content-between">
              <h3 class="text-center">
                {{$examination['examinations']->exam_name}}
              </h3>
              <a href="{{route('examination.edit', $examination['examinations']->id)}}" class="btn btn-sm btn-light">Edit exam</a>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="row">
                    <div class="col-2">
                        <h6>Status</h6>
                    </div>
                    <div class="col-10">
                        {{ 
                            $examination['starts_in'] !== 'Already started' 
                                ? "Starts in: " . $examination['starts_in'] 
                                : ($examination['ended'] === 'Not ended yet' 
                                    ? "Already started, Not ended yet" 
                                    : "Ended: " . $examination['ended'])
                        }}
                    </div>
                </div>
              </li>
              
              <li class="list-group-item">
                <div class="row">
                    <div class="col-4 text-center">
                        <a href="{{route('enroll.students', $examination['examinations']->id)}}" class="btn btn-sm btn-light">Enroll students</a>
                    </div>
                    <div class="col-4 text-center">
                        <a href="{{route('question.create', $examination['examinations']->id)}}" class="btn btn-sm btn-light">Set questions</a>
                    </div>
                    <div class="col-4 text-center">
                        <a href="" class="btn btn-sm btn-light">Review answers</a>
                    </div>
                </div>
              </li>
            </ul>
          </div>
    @endforeach
@else
    <h3 class="text-center my-3">You have not created any examinations yet</h3>
@endif

</x-examiner>