<x-examiner>

    @if (session('success'))
        <div class="text-bg-success p-2 w-50 my-2 mx-auto">
            {{ session('success') }}
        </div>
    @endif
    <h3 class="text-center my-2">{{ ucwords(auth()->user()->username) }}, welcome to Examiner</h3>
    <x-examinerdashboard></x-examinerdashboard>


    @if ($questions->count() > 0)
        <a href="{{ route('question.create', $examination) }}" class="text-decoration-none">Add more questions</a>

        <h3 class="text-center my-1">Questions for {{ $examination->exam_name }} </h3>

        @foreach ($questions as $question)
            <h6>Question {{ $loop->iteration }}</h6>
            <div class="p-3 bg-light mb-3">
                <p>{{ $question->question }} <span class="fw-bold">{{ $question->marks }} marks</span></p>

                @if ($question->type == 'multiple_choice')
                    @if ($question->option_one != null)
                        <div>
                            <input type="radio" id="option_one">
                            <label for="option_one">{{ $question->option_one }}</label>
                        </div>
                    @endif

                    @if ($question->option_two != null)
                    <div>
                        <input type="radio" id="option_two">
                        <label for="option_two">{{ $question->option_two }}</label>
                    </div>
                    @endif

                    @if ($question->option_three != null)
                        <div>
                            <input type="radio" id="option_three">
                            <label for="option_three">{{ $question->option_three }}</label>
                        </div>
                    @endif

                    @if ($question->option_four != null)
                        <div>
                            <input type="radio" id="option_four">
                            <label for="option_four">{{ $question->option_four }}</label>
                        </div>
                    @endif

                    @if ($question->option_five != null)
                        <div>
                            <input type="radio" id="option_five">
                            <label for="option_five">{{ $question->option_five }}</label>
                        </div>
                    @endif
                @endif

                <a href="" class="btn btn-primary btn-sm mt-2">Edit</a>
                <a href="" class="btn btn-danger btn-sm mt-2">Delete</a>
            </div>
        @endforeach
    @else
        <h3 class="text-center my-3">You have not added questions for {{ $examination->exam_name }} yet </h3>
    @endif

</x-examiner>
