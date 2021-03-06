@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->title }}</div>

                <div class="card-body">
                    <a class="btn btn-dark" href="{{ route('questionnaires.questions.create', ['questionnaire' => $questionnaire->id]) }}">
                        {{ __('questionnaire.add_question') }}
                    </a>
                    <a class="btn btn-dark" href="{{ route('surveys.show', ['questionnaire' => "$questionnaire->id", 'slug' => Str::slug($questionnaire->title)]) }}">
                        {{ __('questionnaire.take_survey') }}
                    </a>
                </div>
            </div>

            @foreach ($questionnaire->questions as $question)
                <div class="card mt-4">
                    <div class="card-header">{{ $question->question }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($question->answers as $answer)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>{{ $answer->answer }}</div>
                                    @if ($question->responses->count())
                                        <div>{{ intval(($answer->responses->count() * 100) / $question->responses->count()) }}%</div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-footer">
                    <form action="{{ route('questionnaires.questions.destroy', [
                        'questionnaire' => $questionnaire->id,
                        'question'      => $question->id
                    ]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger">{{ __('question.button_delete') }}</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
