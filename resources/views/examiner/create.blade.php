<x-examiner>
    <form action="{{route('examiner.store')}}" method="post" class="w-50 mx-auto bg-light p-5 my-3">
        @csrf
        <h3 class="text-center">Become an examiner</h3>
        <p class="text-muted text-center">Sign up</p>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') border-danger @enderror" id="username" name="username" placeholder="Username">
            @error('username')
                <p class="text-danger"> {{$message}} </p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') border-danger @enderror" id="email" name="email" placeholder="Email">
            @error('email')
            <p class="text-danger"> {{$message}} </p>
        @enderror
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') border-danger @enderror" id="password" name="password" placeholder="Password">
            @error('password')
            <p class="text-danger"> {{$message}} </p>
        @enderror
          </div>
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control @error('password') border-danger @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
          </div>

          <div class="mb-3">
            <button class="btn btn-secondary w-100">Sign up</button>
          </div>
          <p>Already have an account? <a href="{{route('login')}}" class="text-decoration-none">Login</a></p>
    </form>
</x-examiner>