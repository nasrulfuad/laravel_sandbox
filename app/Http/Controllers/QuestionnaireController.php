<?php

namespace App\Http\Controllers;

use App\Http\Requests\Questionnaire\QuestionnaireRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Questionnaire;
use Illuminate\View\View;

class QuestionnaireController extends Controller
{

    public function create(): View
    {
        return view('questionnaire.create');
    }

    public function store(QuestionnaireRequest $request): RedirectResponse
    {
        $questionnaire = auth()->user()->questionnaires()->create($request->validated());

        return redirect()->route('questionnaires.show', ['questionnaire' => $questionnaire->id]);
    }

    public function show(Questionnaire $questionnaire): View
    {
        return view('questionnaire.show', compact('questionnaire'));
    }
}
