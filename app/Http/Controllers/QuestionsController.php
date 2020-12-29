<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;
use Illuminate\Support\Facades\Gate;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('user')->latest()->Paginate(5);

        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question();

        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()->create($request->only('title', 'body'));

        return redirect()->route('questions.index')->with('success', "Your quesion has been submitted");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->increment('views');

        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
<<<<<<< HEAD
        if (\Gate::denies('update-question', $question)) {
            abort(403, "Access denied");
        }

=======
        dd($question);
>>>>>>> 11d3f2f4168e6891c8e2b5ffde4bd0cc9e65d68f
        return view('questions.edit', compact('question'));
        // if (Gate::allows('update-question', $question)) {
        //     return view('questions.edit', compact('question'));
        // }
        // abort(403, "Access denied");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        if (\Gate::denies('update-question', $question)) {
            abort(403, "Access denied");
        }

        $question->update($request->only('title', 'body'));

        return redirect()->route('questions.index')->with('success', "Your quesion has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        if (\Gate::denies('delete-question', $question)) {
            abort(403, "Access denied");
        }

        $question->delete();

        return redirect()->route('questions.index')->with('success', "Your quesion has been deleted.");
    }
}
