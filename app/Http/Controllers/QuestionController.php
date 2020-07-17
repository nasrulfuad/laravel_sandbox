<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\QuestionRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Questionnaire;
use Illuminate\View\View;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire): View
    {
        return view('question.create', compact('questionnaire'));
    }

    public function store(QuestionRequest $request, Questionnaire $questionnaire): RedirectResponse
    {
        $data = $request->validated();

        \DB::transaction(function () use($questionnaire, $data) {
            $question = $questionnaire->questions()->create($data['question']);

            $question->answer()->createMany($data['answers']);
        });

        return redirect()->route('questionnaires.questions.create', ['questionnaire' => $questionnaire->id]);
    }
}
