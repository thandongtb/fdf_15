<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <!-- Bootstrap Core CSS -->
        {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css') !!}

        <!-- MetisMenu CSS -->
        {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.5.2/metisMenu.min.css') !!}

        <!-- Custom CSS -->
        {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7+1/css/sb-admin-2.min.css') !!}

        <!-- Morris Charts CSS -->
        {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css') !!}

        <!-- Custom Fonts -->
        {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') !!}

        {!! Html::style('https://fonts.googleapis.com/css?family=Lato:100,300,400,700') !!}

        {!! Html::style('css/admin/main.css') !!}

        {!! Html::style('bower/bootstrap3-dialog/dist/css/bootstrap-dialog.css') !!}

        {!! Html::style('assets/jLoader/introLoader.min.css') !!}

        {!! Html::style('bower/toastr/toastr.css') !!}

        @yield('style')

    </head>
    <body>
        <div id="loading"></div>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">{{ trans('admin/users.admin') }}</a>
                    <a class="navbar-brand" href="{{ action('Home\HomeController@index') }}">{{ trans('admin/users.home') }}</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="">
                                    <i class="fa fa-user fa-fw"></i>{{ trans('admin/users.user_profile_title') }}
                                </a>
                            </li>
                            <li>
                                <a href=""
                                    onclick="event.preventDefault();
                                             $('#logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i>
                                    {{ trans('homepage.logout') }}
                                </a>

                                {{ Form::open(['url' => '/logout', 'method' => 'post', '
                                    id' => 'logout-form', 'class' => 'display-none']) }}
                                    {{ csrf_field() }}
                                {{ Form::close() }}
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control"
                                    placeholder="Search...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>

                            <li>
                                <a href="">
                                    <i class="fa fa-users fa-fw"></i>
                                        {{ trans('admin/users.manage_users') }}
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ action('Admin\UsersController@index') }}">
                                            {{ trans('admin/users.all_users') }}
                                        </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="">
                                    <i class="fa fa-tasks fa-fw"></i>
                                        {{ trans('admin/users.manage_categories') }}
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ action('Admin\CategoriesController@index') }}">
                                            {{ trans('admin/users.all_categories') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ action('Admin\CategoriesController@create') }}">
                                            {{ trans('admin/users.create_categories') }}
                                        </a>
                                    </li>

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="">
                                    <i class="fa fa-file-text-o fa-fw"></i>
                                    {{ trans('admin/users.manage_product') }}<span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ action('Admin\ProductController@index') }}">
                                            {{ trans('admin/users.all_products') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ action('Admin\ProductController@create') }}">
                                            {{ trans('admin/users.create_product') }}
                                        </a>
                                    </li>

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="">
                                    <i class="fa fa-font fa-fw"></i>
                                        {{ trans('admin/users.manage_orders') }}
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ action('Admin\OrderController@index') }}">
                                            {{ trans('admin/users.all_orders') }}
                                        </a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <div class="col-lg-8 col-lg-offset-2">
                @include('layouts.message')
            </div>
            @yield('content')
        </div>

        <!-- jQuery -->
        {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js') !!}

        <!-- Bootstrap Core JavaScript -->
        {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js') !!}

        <!-- Metis Menu Plugin JavaScript -->
        {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.5.2/metisMenu.min.js') !!}

        <!-- Morris Charts JavaScript -->
        {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js') !!}

        <!-- Custom Theme JavaScript -->
        {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7+1/js/sb-admin-2.js') !!}
        {!! Html::script('bower/jquery-confirm/jquery.confirm.js') !!}

        {!! Html::script('bower/bootstrap3-dialog/dist/js/bootstrap-dialog.js') !!}

        {!! Html::script('assets/jLoader/jquery.introLoader.js') !!}

        {!! Html::script('assets/jLoader/helpers/jquery.easing.1.3.js') !!}

        {!! Html::script('assets/jLoader/helpers/spin.min.js') !!}

        {!! Html::script('js/loader.js') !!}

        {!! Html::script('bower/toastr/toastr.js') !!}

        @yield('js')
    </body>
</html>
