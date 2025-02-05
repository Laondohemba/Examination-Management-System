<x-examiner>

    @if (session('success'))
        <div class="text-bg-success p-2 w-50 my-2 mx-auto">
            {{ session('success') }}
        </div>
    @endif
    <h3 class="text-center my-2">{{ ucwords(auth()->user()->username) }}, welcome to Examiner</h3>
    <x-examinerdashboard></x-examinerdashboard>

    <div class="w-75 mx-auto d-flex justify-content-around">
        <a href="{{ route('question.index', $examination->examination->id) }}" class="text-decoration-none">Back to questions</a>

        <h3>Update question</h3>
    </div>
    <form action="{{route('question.update', $question)}}" method="post" class="w-75 bg-light p-5 my-3 mx-auto">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 mb-3">
                <label for="type" class="form-label">Question type</label>
                <select name="type" id="type" class="form-select">
                    <option value="theory" {{isset($question->type) && $question->type === 'theory' ? 'selected' : ''}}>Theory</option>
                    <option value="multiple_choice" {{isset($question->type) && $question->type === 'multiple_choice' ? 'selected' : ''}}>Multiple choice</option>
                </select>
                @error('type')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-12 mb-3">
                <label for="question" class="form-label">Question</label>
                <textarea class="form-control" rows="5" id="question" name="question">{{ $question->question }}</textarea>
                @error('question')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            @if ($question->type == 'multiple_choice')
                <div class="col-12 mb-3">
                    <label for="option_one" class="form-label">Option one</label>
                    <input type="text" class="form-control" id="option_one" name="option_one" value="{{$question->option_one}}">
                    @error('option_one')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <label for="option_two" class="form-label">Option two</label>
                    <input type="text" class="form-control" id="option_two" name="option_two" value="{{$question->option_two}}">
                    @error('option_two')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                @if ($question->option_three != null)
                    <div class="col-12 mb-3">
                        <label for="option_three" class="form-label">Option three</label>
                        <input type="text" class="form-control" id="option_three" name="option_three" value="{{$question->option_three}}">
                        @error('option_three')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

                @if ($question->option_four != null)
                    <div class="col-12 mb-3">
                        <label for="option_four" class="form-label">Option four</label>
                        <input type="text" class="form-control" id="option_four" name="option_four" value="{{$question->option_four}}">
                        @error('option_four')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

                @if ($question->option_five != null)
                    <div class="col-12 mb-3">
                        <label for="option_five" class="form-label">Option five</label>
                        <input type="text" class="form-control" id="option_five" name="option_five" value="{{$question->option_five}}">
                        @error('option_five')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

            @endif

            <div class="col mb-3">
                <label for="answer" class="form-label">Answer</label>
                <input type="text" class="form-control" id="answer" name="answer" value="{{$question->answer}}">
                @error('answer')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="col mb-3">
                <label for="marks" class="form-label">Marks</label>
                <input type="text" class="form-control" id="marks" name="marks" value="{{$question->marks}}">
                @error('marks')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            @error('updateFailed')
                <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="col-12 mt-3">
                <button class="btn btn-secondary w-100 mx-auto">Update question</button>
            </div>
        </div>
    </form>
</x-examiner>
