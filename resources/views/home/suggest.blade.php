@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    @include('home.header')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>{{ trans('homepage.suggest') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area <--></-->

    <div class="row">
        <div class="panel-body col-lg-8 col-lg-offset-2">
            {!! Form::open([
                'action' => 'Home\SuggestController@store',
                'method' => 'POST',
                'files' => true
            ]) !!}
                <div class="form-group">
                    <div class="col-lg-6">
                        {!! Form::label('name', trans('product.name')) !!}
                        {!! Form::text('name', null, [
                            'class' => 'form-control',
                            'required' => 'required'
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
                            'required' => 'required',
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
                        <hr>
                        {!! Form::label('image', trans('product.image')) !!}
                        {!! Form::file('image', [
                            'class' => 'hide',
                            'id' => 'file-product-image'
                        ]) !!}

                        <img alt="" src="{{ config('common.default_product_image') }}"
                            class="img-create-product img-responsive" id="create-product-image">

                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                        <hr>
                    </div>
                    <hr>
                    <div class="text-center">
                        {!! Form::submit(trans('product.save'), [
                            'class' => 'btn btn-primary btn-create-suggest-submit'
                        ]) !!}
                        <a href="{!! action('Home\HomeController@index') !!}"
                            class="btn btn-default">
                            {{ trans('product.back') }}
                        </a>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('js')
    {!! Html::script('js/suggest.js') !!}
@endsection
