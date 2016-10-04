@extends('layouts.admin')

@section('title')
    {{ trans('admin/users.create_product') }}
@endsection

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">{{ trans('admin/users.create_product') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel-body col-lg-8 col-lg-offset-2">
            {!! Form::open([
                'route' => 'product.store',
                'files' => true
            ]) !!}
                <div class="form-group">
                    <div class="col-lg-6">
                        {!! Form::label('name', trans('product.name')) !!}
                        {!! Form::text('name', null, [
                            'class' => 'form-control'
                        ]) !!}

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
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

                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                        <hr>
                    </div>
                    <div class="col-lg-6">
                        {!! Form::label('quantity', trans('product.quantity')) !!}
                        {!! Form::number('quantity', null, [
                            'class' => 'form-control',
                            'min' => config('common.min_quantity_product')
                        ]) !!}

                        @if ($errors->has('quantity'))
                            <span class="help-block">
                                <strong>{{ $errors->first('quantity') }}</strong>
                            </span>
                        @endif
                        <hr>
                        {!! Form::label('price', trans('product.price')) !!}
                        {!! Form::number('price', null, [
                            'class' => 'form-control',
                            'step' => config('common.step_of_price'),
                            'min' => config('common.min_price_product'
                        )]) !!}

                        @if ($errors->has('price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                        <hr>
                        {!! Form::label('status', trans('product.status')) !!}
                        {!! Form::select('status', $optionStatus, null, [
                            'class' => 'form-control'
                        ]) !!}

                        <hr>
                        {!! Form::label('image', trans('product.image')) !!}
                        {!! Form::file('image', [
                            'class' => 'hide',
                            'id' => 'file-product-image'
                        ]) !!}

                        <img alt="" src="{{ config('common.default_product_image') }}" class="img-create-product img-responsive" id="create-product-image">

                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                        <hr>
                    </div>
                    <div class="text-center">
                        {!! Form::submit(trans('product.save'), ['class' => 'btn btn-primary btn-create-product-submit']) !!}
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

@endsection

@section('js')
    {!! Html::script('js/admin/product.js') !!}
@endsection
