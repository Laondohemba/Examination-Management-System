<x-student>
    <h3 class="text-center my-5">Updae your profile</h3>

    <form action="{{ route('profile.update') }}" method="post" class="p-5 bg-light w-50 mx-auto">
        @csrf

        <div class="row">
            <div class="col-12 mb-3">
                <lable for="name" class="form-label">Name</lable>
                <input type="text" class="form-control @error('name') border-danger @enderror" value="{{old('name')}}" placeholder="Name" name="name" id="name">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="col-12 mb-3">
                <lable for="reg_no" class="form-label">Registration number</lable>
                <input type="text" class="form-control @error('reg_no') border-danger @enderror" value="{{old('reg_no')}}" placeholder="Registration number" name="reg_no" id="reg_no">
                @error('reg_no')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>

            <div class="col-12 mb-3">
                <lable for="phone" class="form-label">Phone number</lable>
                <input type="tel" class="form-control @error('phone') border-danger @enderror" value="{{old('phone')}}" placeholder="Phone number" name="phone" id="phone">
                @error('phone')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>

            @error('updateFailed')
                <p class="text-danger">{{$message}}</p>
            @enderror

            <div class="col-12 mb-3">
                <button class="btn btn-secondary w-100">Save changes</button>
            </div>
        </div>
    </form>
</x-student>
