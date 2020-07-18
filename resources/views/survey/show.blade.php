@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $questionnaire->title }}</h1>

            <form action="{{ route('surveys.show', ['questionnaire' => "$questionnaire->id", 'slug' => Str::slug($questionnaire->title)]) }}" method="POST">
                @csrf

                @foreach ($questionnaire->questions as $key => $question)
                    <div class="card mt-4">
                        <div class="card-header"><strong>{{ $key + 1 }} </strong>{{ $question->question }}</div>

                        <div class="card-body">

                            @error('responses.'. $key .'.answer_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <ul class="list-group">
                                @foreach ($question->answers as $answer)
                                    <label for="answer{{ $answer->id }}">
                                        <li class="list-group-item">
                                            <input type="radio" name="responses[{{ $key }}][answer_id]"
                                                   {{ (old('responses.'. $key .'.answer_id') == $answer->id) ? 'checked' : ''  }}
                                                   value="{{ $answer->id }}" id="answer{{ $answer->id }}" class="mr-2">
                                            {{ $answer->answer }}
                                            <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                                        </li>
                                    </label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach

                <div class="card mt-4">
                    <div class="card-header">{{ __('survey.info_title') }}</div>

                    <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{ __('survey.fields.name_label') }}</label>
                                <input type="text" name="survey_information[name]"
                                    class="form-control" id="name" aria-describedby="nameHelp"
                                    value="{{ old('survey_information.name') }}"
                                    placeholder="{{ __('survey.fields.name_placeholder') }}">
                                <small id="nameHelp" class="form-text text-muted">{{ __('survey.fields.name_help') }}</small>

                                @error('survey_information.name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('survey.fields.email_label') }}</label>
                                <input type="email" name="survey_information[email]"
                                    class="form-control" id="email" aria-describedby="emailHelp"
                                    value="{{ old('survey_information.email') }}"
                                    placeholder="{{ __('survey.fields.email_placeholder') }}">
                                <small id="emailHelp" class="form-text text-muted">{{ __('survey.fields.email_help') }}</small>

                                @error('survey_information.email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                    </div>
                </div>

                <button class="btn btn-block btn-dark mt-4" type="submit">{{ __('survey.complete_survey') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
