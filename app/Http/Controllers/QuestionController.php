<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Examination;

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
