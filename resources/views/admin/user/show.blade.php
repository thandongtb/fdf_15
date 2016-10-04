@extends('layouts.admin')

@section('title')
    {{ trans('admin/users.user_detail') }}
@endsection

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">
                {{ trans('admin/users.user_detail') }}
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center">
                            <img alt="{{ $user->name }}"
                            src="{{ is_null($user->avatar) ?
                                config('user.avatar.default_url') : $user->avatar }}"
                            class="img-circle img-responsive">
                        </div>
                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>{{ trans('admin/users.user_id') }}:</td>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('admin/users.name') }}:</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('admin/users.email') }}:</td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}">
                                                {{ $user->email }}\
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('admin/users.user_address') }}:</td>
                                        <td>{{ $user->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('admin/users.phone') }}:</td>
                                        <td>{{ $user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('admin/users.role') }}:</td>
                                        <td>
                                            @if ($user->isAdmin())
                                                {{ trans('admin/users.admin') }}
                                            @else
                                                {{ trans('admin/users.user') }}
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
