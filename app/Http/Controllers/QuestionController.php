<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\QuestionRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Questionnaire;
use Illuminate\View\View;
use App\Models\Question;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire): View
    {
        $this->authorize('view', $questionnaire);

        return view('question.create', compact('questionnaire'));
    }

    public function store(QuestionRequest $request, Questionnaire $questionnaire): RedirectResponse
    {
        $this->authorize('view', $questionnaire);

        $data = $request->validated();

        \DB::transaction(function () use($questionnaire, $data) {
            $question = $questionnaire->questions()->create($data['question']);

            $question->answers()->createMany($data['answers']);
        });

        return redirect($questionnaire->path());
    }

    public function destroy(Questionnaire $questionnaire, Question $question): RedirectResponse
    {
        $this->authorize('view', $questionnaire);

        \DB::transaction(function () use($question) {
            $question->answers()->delete();

            $question->delete();
        });

        return redirect($questionnaire->path());
    }
}
