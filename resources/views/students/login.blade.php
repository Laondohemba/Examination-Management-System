<x-student>
    <h3 class="text-center my-5">Welcome to Examiner</h3>
    <p class="text-center text-muted mb-3">Login to take your exam</p>

    <div class="row">
        <div class="col-sm-5">
            <img src="{{ asset('images/student.jpg') }}" alt="examiner student" class="img-fluid">
        </div>
        <div class="col-sm-7">
            <form action="{{ route('login.student') }}" method="post" class="p-5 bg-light">
                @csrf

                <div class="row">
                    <div class="col-12 mb-3">
                        <lable for="email" class="form-label">Email</lable>
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                    </div>
                    <div class="col-12 mb-3">
                        <lable for="password" class="form-label">Password</lable>
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            id="password">
                    </div>

                    @error('loginFailed')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <div class="col-12 mb-3">
                        <button class="btn btn-secondary w-100">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-student>
