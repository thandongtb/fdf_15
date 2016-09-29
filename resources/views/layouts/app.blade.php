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

    {!! Html::style('css/home.css') !!}

    {!! Html::style('css/responsive.css') !!}

    {!! Html::style('assets/jLoader/introLoader.min.css') !!}

    @yield('css')

    <!-- Scripts -->
    <script>
        window.Laravel =  {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
</head>
<body>
    <div id="loading"></div>
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="header-right">
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
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->

    @include('layouts.message')
    @yield('content')

    <!-- Scripts -->
    {!! Html::script('bower/jquery/dist/jquery.js') !!}

    {!! Html::script('bower/bootstrap/dist/js/bootstrap.min.js') !!}

    {!! Html::script('bower/owl.carousel/dist/owl.carousel.js') !!}

    {!! Html::script('bower/jquery.bxslider/js/jquery.bxslider.js') !!}

    {!! Html::script('assets/sticky/jquery.sticky.js') !!}

    {!! Html::script('js/home.js') !!}

    {!! Html::script('js/script.slider.js') !!}

    {!! Html::script('bower/jquery-confirm/jquery.confirm.js') !!}

    {!! Html::script('assets/jLoader/jquery.introLoader.js') !!}

    {!! Html::script('assets/jLoader/helpers/jquery.easing.1.3.js') !!}

    {!! Html::script('assets/jLoader/helpers/spin.min.js') !!}

    {!! Html::script('js/loader.js') !!}

    @yield('js')
</body>
</html>
