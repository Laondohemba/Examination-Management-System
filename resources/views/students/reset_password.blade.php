<x-student>
    <h3 class="text-center my-5">Reset your password to continue</h3>

    <div class="row">
        <div class="col-sm-5">
            <img src="{{ asset('images/student1.jpg') }}" alt="examiner student" class="img-fluid">
        </div>
        <div class="col-sm-7">
            <form action="{{ route('password.reset', $student) }}" method="post" class="p-5 bg-light">
                @csrf

                <div class="row">
                    <div class="col-12 mb-3">
                        <lable for="old_password" class="form-label">Old Password</lable>
                        <input type="password" class="form-control @error('old_password') border-danger @enderror"
                            placeholder="Old Password" name="old_password" id="old_password">
                        @error('old_password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <lable for="password" class="form-label">New Password</lable>
                        <input type="password" class="form-control @error('password') border-danger @enderror"
                            placeholder="Password" name="password" id="password">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <lable for="password_confirmation" class="form-label">Confirm Password</lable>
                        <input type="password" class="form-control @error('password') border-danger @enderror"
                            placeholder="Confirm Password" name="password_confirmation" id="password_confirmation">
                    </div>

                    @error('resetFailed')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="col-12 mb-3">
                        <button class="btn btn-secondary w-100">Reset Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-student>
