<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ Config::get('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

            <link href="{{ asset('components/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ Route::has(Config::get('languages.'.App::getLocale().'.as').'home') ? route(Config::get('languages.'.App::getLocale().'.as').'home') : '#' }}">@lang('app.home')</a>
                    @else
                        <a href="{{ Route::has(Config::get('languages.'.App::getLocale().'.as').'login') ? route(Config::get('languages.'.App::getLocale().'.as').'login') : '#' }}">@lang('app.login')</a>
                        <a href="{{ Route::has(Config::get('languages.'.App::getLocale().'.as').'register') ? route(Config::get('languages.'.App::getLocale().'.as').'register') : '#' }}">@lang('app.register')</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{ Config::get('app.name') }}
                </div>

                <div class="links">
                @foreach(
                    Config::get('languages')
                    as $key => $language
                )

                    <a href="{{ Route::has($language['as'].'welcome') ? route($language['as'].'welcome') : '#' }}">

                            @if($language['flag'])
                            <span class="flag-icon flag-icon-{{ $language['flag'] }}"></span>
                            @endif

                        {{ $language['native_name'] }}
                    </a>

                @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
