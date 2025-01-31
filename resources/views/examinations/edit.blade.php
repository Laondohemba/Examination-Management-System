<x-examiner>

    @if (session('success'))
        <div class="text-bg-success p-2 w-50 my-2 mx-auto">
            {{ session('success') }}
        </div>
    @endif
    <h3 class="text-center my-2">{{ ucwords(auth()->user()->username) }}, welcome to Examiner</h3>
    <x-examinerdashboard></x-examinerdashboard>

    <form action="{{route('examination.update', $examination->id)}}" method="post" class="bg-light w-50 p-5 mx-auto my-2">
        @csrf
        @method('PATCH')
        <h3 class="text-center my-2">Update Examination</h3>

        <div class="mb-3">
            <label for="exam_name" class="form-label">Examination name</label>
            <input type="text" class="form-control @error('exam_name') border-danger @enderror" value="{{old('exam_name') ?? $examination->exam_name}}" id="exam_name" name="exam_name" placeholder="Examination name">
            @error('exam_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start date</label>
            <input type="date" class="form-control @error('start_date') border-danger @enderror" value="{{old('start_date') ?? $examination->start_date}}" id="start_date" name="start_date" placeholder="Start date">
            @error('start_date')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End date</label>
            <input type="date" class="form-control @error('end_date') border-danger @enderror" value="{{old('end_date') ?? $examination->end_date}}" id="end_date" name="end_date" placeholder="End date">
            @error('end_date')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Start time</label>
            <input type="time" class="form-control @error('start_time') border-danger @enderror" value="{{old('start_time') ?? $examination->start_time}}" id="start_time" name="start_time" placeholder="Start time">
            @error('start_time')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">End time</label>
            <input type="time" class="form-control @error('end_time') border-danger @enderror" value="{{old('end_time') ?? $examination->end_time}}" id="end_time" name="end_time" placeholder="End time">
            @error('end_time')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>

        <div class="mb-3">
            <button class="btn btn-secondary w-100">Update Exam</button>
        </div>
    </form>

</x-examiner>
