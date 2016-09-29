@extends('layouts.admin')

@section('title')
    {{ trans('admin/users.edit_product') }}
@endsection
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">{{ trans('admin/users.edit_product') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
       <div class="panel-body col-lg-8 col-lg-offset-2">
            {{ Form::model($product, [
                'route' => ['product.update', $product->id],
                'method' => 'PUT',
                'files' => true
                ]
            ) }}
                <div class="form-group">
                    <div class="col-lg-6">
                        {!! Form::label('name', trans('product.name')) !!}
                        {!! Form::text('name', null, [
                            'class' => 'form-control'
                        ]) !!}
                        <hr>
                        {!! Form::label('category_id', trans('product.category')) !!}
                        {!! Form::select('category_id', $categories, null, [
                            'class' => 'form-control'
                        ]) !!}
                        <hr>
                        {!! Form::label('description', trans('product.description')) !!}
                        {!! Form::textarea('description', null, [
                            'class' => 'form-control',
                            'rows'=> 5
                        ]) !!}
                        <hr>
                    </div>
                    <div class="col-lg-6">
                        {!! Form::label('quantity', trans('product.quantity')) !!}
                        {!! Form::number('quantity', null, [
                            'class' => 'form-control',
                            'min' => config('settings.min_quantity_product')
                        ]) !!}
                        <hr>
                        {!! Form::label('price', trans('product.price')) !!}
                        {!! Form::number('price', null, [
                            'class' => 'form-control',
                            'step' => config('settings.step_of_price'),
                            'min' => config('settings.min_price_product'
                        )]) !!}
                        <hr>
                        {!! Form::label('status', trans('product.status')) !!}
                        {!! Form::select('status', $optionStatus, null, [
                            'class' => 'form-control'
                        ]) !!}
                        <hr>
                        {!! Form::label('image', trans('product.image')) !!}
                        {!! Form::file('image') !!}
                        <hr>
                    </div>
                    <div class="text-center">
                        {!! Form::submit(trans('product.update'), ['class' => 'btn btn-success btn-edit-product-submit']) !!}
                        <a href="{!! route('product.index') !!}" class="btn btn-default">
                            {{ trans('product.back') }}
                        </a>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection

@section('js')
    {!! Html::script('js/admin/product.js') !!}
@endsection
