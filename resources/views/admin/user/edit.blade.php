@extends('layouts.admin')

@section('title')
    {{ trans('admin/users.user_update') }}
@endsection

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">
                {{ trans('admin/users.user_update') }}
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel-body">
        {{ Form::model($user, ['action' =>
            ['Admin\UsersController@update', $user->id],
            'method' => 'PUT', 'files' => true
        ]) }}
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center">
                            <img alt="{{ $user->name }}"
                                src="{{ is_null($user->avatar) ?
                                    config('user.avatar.default_url') : $user->avatar }}"
                                class="img-circle img-responsive user-avatar"
                                id="user-account-avatar">
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
                                        <td>
                                        {!! Form::text('name', null, [
                                            'class' => 'form-control',
                                            'required' => 'required',
                                            'placeholder' => trans('admin/users.your_name')
                                        ]) !!}
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('admin/users.user_address') }}:</td>
                                        <td>{!! Form::text('address', null, [
                                                'class' => 'form-control',
                                                'required' => 'required',
                                                'placeholder' => trans('admin/users.user_address')
                                            ]) !!}
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('admin/users.phone') }}:</td>
                                        <td>{!! Form::text('phone', null, [
                                                'class' => 'form-control',
                                                'required' => 'required',
                                                'placeholder' => trans('admin/users.phone')
                                            ]) !!}
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('admin/users.email') }}:</td>
                                        <td>{!! Form::text('email', null, [
                                                'class' => 'form-control edit-password-field',
                                                'required' => 'required',
                                                'disabled'=> 'disabled',
                                                'placeholder' => trans('admin/users.your_email')
                                            ]) !!}

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        </td>
                                        <td>
                                            <i class="fa fa-pencil-square-o edit-password"
                                            data-toggle="tooltip" title="{{ trans('homepage.edit_your_password') }} "
                                            aria-hidden="true"> </i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                        {!! Form::file('avatar', [
                                            'class' => 'hide',
                                            'id' => 'file-account-avatar'
                                        ]) !!}
                                        @if ($errors->has('avatar'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('avatar') }}</strong>
                                            </span>
                                        @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    {!! Form::button('
                        <i class="fa fa-pencil-square"></i> ' .
                         trans('admin/users.update'), [
                            'type' => 'submit',
                            'class' => 'btn btn-warning'
                        ]) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection

@section('js')
    {!! Html::script('js/user-update.js') !!}
@endsection
