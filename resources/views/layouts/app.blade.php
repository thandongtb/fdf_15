<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    {!! Html::style('css/app.css') !!}
    {!! Html::style('bower/jquery-confirm2/css/jquery-confirm.css') !!}

    @yield('css')

    <!-- Scripts -->
    <script>
        window.Laravel =  {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">{{ trans('homepage.toggle') }}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ action('Home\HomeController@index') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ action('Auth\LoginController@showLoginForm') }}">{{ trans('homepage.login') }}</a></li>
                        <li><a href="{{ action('Auth\RegisterController@showRegistrationForm') }}">{{ trans('homepage.register') }}</a></li>
                    @else
                        @if (Auth::user()->isAdmin())
                            <li><a href="{{ action('Admin\AdminController@index') }}">{{ trans('homepage.to_admin_page') }}</a></li>
                        @endif
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="">
                                        {{ trans('homepage.user_profile') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ action('Auth\LoginController@logout') }}"
                                        onclick="event.preventDefault();
                                                 $('#logout-form').submit();">
                                        {{ trans('homepage.logout') }}
                                    </a>

                                    {{ Form::open(['url' => '/logout', 'method' => 'post', 'id' => 'logout-form', 'class' => 'display-none']) }}
                                        {{ csrf_field() }}
                                    {{ Form::close() }}
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <ul class="nav navbar-nav" id="top-navbar">
                    <li id="nav-home" class="active"><a href="{{ URL('home') }}">{{ trans('homepage.home_menu') }}</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @include('layouts.message')
    @yield('content')

    <!-- Scripts -->
    {!! Html::script('bower/jquery/dist/jquery.js') !!}
    {!! Html::script('js/app.js') !!}
    {!! Html::script('bower/jquery-confirm2/js/jquery-confirm.js') !!}

    @yield('js')
</body>
</html>
