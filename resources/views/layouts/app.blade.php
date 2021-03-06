<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{--
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    --}}

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- Optional theme -->
    <link rel="stylesheet" href="{{ asset('components/bootstrap/dist/css/bootstrap-theme.min.css') }}">

    <link href="{{ asset('components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('components/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">

    {{--
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    --}}

    @yield('styles')

    <style type="text/css">
        body {
            overflow-y: scroll;
            padding-bottom: 100px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @if (Auth::guest())
                    <a class="navbar-brand" href="{{ route_lang(App::getLocale(), 'welcome') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    @else
                    <a class="navbar-brand" href="{{ route_lang(App::getLocale(), 'home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    @include('commons.widgets.language-switcher')

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route_lang(App::getLocale(), 'login') }}">@lang('app.login')</a></li>
                            <li><a href="{{ route_lang(App::getLocale(), 'register') }}">@lang('app.register')</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route_lang(App::getLocale(), 'users.edit', ['id' => Auth::user()->id]) }}">
                                            @lang('app.your_profile')
                                        </a>

                                        <a href="{{ route_lang(App::getLocale(), 'logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            @lang('app.logout')
                                        </a>

                                        <form id="logout-form" action="{{ route_lang(App::getLocale(), 'logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>


                </div>
            </div>
        </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('commons.widgets.errors')
            
                @yield('content')
            </div>
        </div>
    </div>

    {{--
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    --}}

    <script src="{{ asset('components/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    @yield('scripts')
</body>
</html>
