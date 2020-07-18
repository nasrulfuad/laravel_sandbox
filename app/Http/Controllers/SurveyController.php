<?php

namespace App\Http\Controllers;

use App\Http\Requests\Survey\SurveyRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Questionnaire;
use Illuminate\View\View;

class SurveyController extends Controller
{
    public function show(Questionnaire $questionnaire, $slug): View
    {
        $questionnaire->load('questions.answers');

        return view('survey.show', compact('questionnaire'));
    }

    public function store(SurveyRequest $request, Questionnaire $questionnaire)
    {
        $data = $request->validated();

        \DB::transaction(function () use($questionnaire, $data) {
            $survey = $questionnaire->surveys()->create($data['survey_information']);

            $survey->responses()->createMany($data['responses']);
        });

        return view('survey.thank_you', compact('data'));
    }
}
