<x-examiner>
    <form action="{{ route('examiner.login') }}" method="post" class="w-50 mx-auto bg-light p-5 my-3">
        @csrf
        <h3 class="text-center">Welcome back</h3>
        <p class="text-muted text-center">Please login to continue</p>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') border-danger @enderror" id="username"
                name="username" placeholder="Username">
            @error('username')
                <p class="text-danger"> {{ $message }} </p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') border-danger @enderror" id="password"
                name="password" placeholder="Password">
            @error('password')
                <p class="text-danger"> {{ $message }} </p>
            @enderror
        </div>
        <div class="mb-3">
            @error('loginFailed')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <button class="btn btn-secondary w-100">Login</button>
        </div>
        <p>Don't have an account? <a href="{{route('examiner.create')}}" class="text-decoration-none">Sign up</a></p>
        <p><a href="{{route('student.login')}}" class="text-decoration-none">Student login</a></p>
    </form>
</x-examiner>
