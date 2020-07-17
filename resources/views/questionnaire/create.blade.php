@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('home.create_questionnaire') }}</div>

                <div class="card-body">
                    <form action="{{ route('questionnaires.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="title">{{ __('questionnaire.fields.title_label') }}</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp" placeholder="{{ __('questionnaire.fields.title_placeholder') }}">
                            <small id="titleHelp" class="form-text text-muted">{{ __('questionnaire.fields.title_help') }}</small>

                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purpose">{{ __('questionnaire.fields.purpose_label') }}</label>
                            <input type="text" name="purpose" class="form-control" id="purpose" aria-describedby="purposeHelp" placeholder="{{ __('questionnaire.fields.purpose_placeholder') }}">
                            <small id="purposeHelp" class="form-text text-muted">{{ __('questionnaire.fields.purpose_help') }}</small>

                            @error('purpose')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('questionnaire.fields.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
