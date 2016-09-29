@extends('layouts.admin')

@section('title')
    {{ trans('admin/users.product_detail') }}
@endsection
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">{{ trans('admin/users.product_detail') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel-body">
            <div class="col-lg-4">
                <img src="{{ $product->image }}" class="img-product-detail">
            </div>
            <div class="form-group col-lg-8">
                <table class="table table-product-information">
                    <tbody>
                        <tr>
                            <th>{{ trans('product.id') }}</th>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('product.name') }}</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('product.description') }}:</th>
                            <td>{{ $product->description }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('product.category') }}</th>
                            <td>
                                <a href="{{ action('Admin\CategoriesController@show', ['id' => $product->category_id]) }}">
                                    {{ $product->category->name }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>{{ trans('product.price') }}</th>
                            <td>{{ $product->price }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('product.quantity') }}</th>
                            <td>{{ $product->quantity }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('product.status') }}</th>
                            <td>{{ $product->status ? trans('product.active') : trans('product.disable') }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('product.rate_average') }}</th>
                            <td>{{ empty($product->rate_average) ? config('common.default_rate_average') : $product->rate_average }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('product.view_count') }}</th>
                            <td>{{ empty($product->rate_count) ? config('common.default_rate_count') : $product->rate_count }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('product.view_count') }}</th>
                            <td>{{ empty($product->view_count) ? config('common.default_view_count') : $product->view_count }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('product.created_at') }}:</th>
                            <td>{{ $product->created_at }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('product.updated_at') }}:</th>
                            <td>{{ $product->updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="{!! route('product.edit', [$product->id]) !!}" class="btn btn-success">
                        {{ trans('product.edit_product') }}
                    </a>
                    <a href="{!! route('product.index') !!}" class="btn btn-default">
                        {{ trans('product.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->
@endsection

@section('js')
    {!! Html::script('js/admin/product.js') !!}
@endsection
