<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="jumbotron text-center m-0" style="height: 100vh">
        <h1 class="display-3">{{ __('survey.thank.title') }}</h1>
        <p class="lead">{{ __('survey.thank.message') }} {{ $data['survey_information']['name'] }}.</p>
        <hr>
        <p>
            {{ __('survey.thank.ask_trouble') }} <a href="#">{{ __('home.menus.contact_us') }}</a>
        </p>
        <p class="lead">
            <a class="btn btn-primary btn-sm" href="{{ route('root') }}" role="button">{{ __('home.continue') }}</a>
        </p>
    </div>
</body>
</html>
