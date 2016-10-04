@extends('layouts.admin')

@section('title')
    {{ trans('admin/users.all_orders') }}
@endsection

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">
                {{ trans('admin/users.all_orders') }}
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ action('Admin\OrderController@downloadExcel', 'xlsx') }}">
                <button class="btn btn-success">
                    <i class="fa fa-download"></i>
                    {{ trans('homepage.download_order') }}
                </button>
            </a>
        </div>
        <hr>
        @include('admin.order.table')
        {!! $orders->render() !!}
    </div>
    <!-- /.row -->
</div>
@endsection
