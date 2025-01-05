<x-examiner>

    @if (session('success'))
        <div class="text-bg-success p-2 w-50 my-2 mx-auto">
            {{session('success')}}
        </div>
    @endif
    <h3 class="text-center my-2">{{ucwords(auth()->user()->username)}}, welcome to Examiner</h3>
    <x-examinerdashboard></x-examinerdashboard>

    @if ($examinations->count() > 0)
        <h3 class="text-center my-3">Your recent examinations</h3>
        @foreach ($examinations as $examination)
        <div class="card mx-auto my-3" style="width: 40rem;">
            <div class="card-header">
              <h3 class="text-center">
                {{$examination->exam_name}}
              </h3>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="row">
                    <div class="col-2">
                        <h6>Date</h6>
                    </div>
                    <div class="col-5">
                        From {{$examination->start_date}}
                    </div>
                    <div class="col-5">
                        To {{$examination->end_date}}
                    </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                    <div class="col-2">
                        <h6>Time</h6>
                    </div>
                    <div class="col-5">
                        From {{$examination->start_time}}
                    </div>
                    <div class="col-5">
                        To {{$examination->end_time}}
                    </div>
                </div>
              </li>
              
              <li class="list-group-item">
                <div class="row">
                    <div class="col-4">
                        <a href="{{route('enroll.students', $examination)}}" class="btn btn-sm btn-secondary">Enroll students</a>
                    </div>
                    <div class="col-4">
                        <a href="" class="btn btn-sm btn-secondary">Set questions</a>
                    </div>
                    <div class="col-4">
                        <a href="" class="btn btn-sm btn-secondary">Review answers</a>
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