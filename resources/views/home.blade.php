@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('home.dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('questionnaires.create') }}" class="btn btn-dark">{{ __('questionnaire.create') }}</a>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">{{ __('home.my_questionnaires') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($questionnaires as $questionnaire)
                            <li class="list-group-item">
                                <a href="{{ $questionnaire->path() }}">{{ $questionnaire->title }}</a>
                                <div class="mt-2">
                                    <small>
                                        <strong>{{ __('home.share_url') }}</strong>
                                    </small>
                                    <p>
                                        <a href="{{ $questionnaire->publicPath() }}">{{ $questionnaire->publicPath() }}</a>
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
