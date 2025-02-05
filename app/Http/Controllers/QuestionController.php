<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Examination;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

class QuestionController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Examination $examination)
    {
        $questions = Question::with('examination')->where('examination_id', $examination->id)->get();

        return view('questions.index', ['examination' => $examination, 'questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Examination $examination)
    {
        return view('questions.create', ['examination' => $examination]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request, Examination $examination)
    {
        $validated = $request->validated();
        $validated['examination_id'] = $examination->id;

        if(Question::create($validated))
        {
            return to_route('question.index', $examination)->with('success', 'Question added successfully');
        }
        
        return back()->withErrors([
            'storeFailed' => 'An error occured while your request was being processed!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        $examination = Question::with('examination')->where('examination_id', $question->examination_id)->where('id', $question->id)->first();
        // dd($examination);

        return view('questions.edit', ['question' => $question, 'examination' => $examination]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $examination = Question::with('examination')->where('examination_id', $question->examination_id)->where('id', $question->id)->first();

        if(Auth::id() != $question->examination->examiner_id)
        {
            return back()->withErrors([
                'updateFailed' => 'Only the examiner can update their questions.'
            ]);
        }

        $validated = $request->validated();
        if($question->update($validated))
        {
            return to_route('question.index', $question->examination_id)->with('success', 'Question updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $id = $question->examination_id;

        if($question->delete())
        {
            return to_route('question.index', $id)->with('success', 'Question deleted successfully');
        }
    }
}
