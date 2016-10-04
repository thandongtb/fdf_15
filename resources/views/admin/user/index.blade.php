@extends('layouts.admin')

@section('title')
    {{ trans('admin/users.all_users') }}
@endsection

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">
                {{ trans('admin/users.all_users') }}
            </h1>
        </div>
    </div>
    <div class="row">
        @include('admin.user.table')
        {!! $users->render() !!}
    </div>
</div>
@endsection
