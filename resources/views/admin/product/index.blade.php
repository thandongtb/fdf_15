@extends('layouts.admin')

@section('title')
    {{ trans('admin/users.all_products') }}
@endsection

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">{{ trans('admin/users.all_products') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        @include('admin.product.table')
        {!! $products->render() !!}
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->
@endsection

@section('js')
    {!! Html::script('js/admin/product.js') !!}
@endsection
