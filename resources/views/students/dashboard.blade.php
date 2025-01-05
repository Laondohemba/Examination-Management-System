<x-student>
    @if (session('success'))
        <div class="text-bg-success p-2 my-3 w-50">
            {{session('success')}}
        </div>
    @endif
    <h3 class="text-center my-3">Students Dashboard</h3>

    <div class="row">
        <div class="col-md-4">
            <div class="d-flex flex-column text-center">
                <i class="fa fa-user" style="font-size:12rem; color:black"></i>
                <div class="card text-center">
                    <div class="card-header">
                      <strong>Email:</strong> {{ auth('student')->user()->email ?? ''}}
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">
                        <strong>Name:</strong> {{ auth('student')->user()->name ?? ''}}
                      </h5>
                      <p class="card-text">
                        <strong>Phone:</strong> {{ auth('student')->user()->phone ?? ''}}
                      </p>
                      <p class="card-text">
                        <strong>Registration number:</strong> {{ auth('student')->user()->reg_no ?? ''}}
                      </p>
                      <a href="{{route('profile.edit')}}" class="btn btn-light w-100">Update Profile</a>
                    </div>
                  </div>
            </div>
        </div>
        <div class="col-md-8">

        </div>
    </div>
</x-student>