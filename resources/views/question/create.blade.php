@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('question.create') }}</div>

                <div class="card-body">
                    <form action="{{ route('questionnaires.questions.store', ['questionnaire' => $questionnaire->id]) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="question">{{ __('question.fields.question_label') }}</label>
                            <input type="text" name="question[question]"
                                   class="form-control" id="question" aria-describedby="questionHelp"
                                   value="{{ old('question.question') }}"
                                   placeholder="{{ __('question.fields.question_placeholder') }}">
                            <small id="questionHelp" class="form-text text-muted">{{ __('question.fields.question_help') }}</small>

                            @error('question.question')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend>Choices</legend>
                                <small id="choicesHelp" class="form-text text-muted">{{ __('question.fields.choices_help') }}</small>

                                <div>
                                    <div class="form-group">
                                        <label for="answer1">{{ __('question.fields.answer1_label') }}</label>
                                        <input type="text" name="answers[][answer]" class="form-control" id="answer1"
                                               value="{{ old('answers.0.answer') }}"
                                               aria-describedby="choicesHelp" placeholder="{{ __('question.fields.answer1_placeholder') }}">

                                        @error('answers.0.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer2">{{ __('question.fields.answer2_label') }}</label>
                                        <input type="text" name="answers[][answer]" class="form-control" id="answer2"
                                               value="{{ old('answers.1.answer') }}"
                                               aria-describedby="choicesHelp" placeholder="{{ __('question.fields.answer2_placeholder') }}">

                                        @error('answers.1.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer3">{{ __('question.fields.answer3_label') }}</label>
                                        <input type="text" name="answers[][answer]" class="form-control" id="answer3"
                                               value="{{ old('answers.2.answer') }}"
                                               aria-describedby="choicesHelp" placeholder="{{ __('question.fields.answer3_placeholder') }}">

                                        @error('answers.2.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer4">{{ __('question.fields.answer4_label') }}</label>
                                        <input type="text" name="answers[][answer]" class="form-control" id="answer4"
                                               value="{{ old('answers.3.answer') }}"
                                               aria-describedby="choicesHelp" placeholder="{{ __('question.fields.answer4_placeholder') }}">

                                        @error('answers.3.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </fieldset>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('question.fields.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
