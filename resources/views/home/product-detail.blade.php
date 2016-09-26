@extends('layouts.app')

@section('css')
    {!! Html::style('bower/toastr/toastr.css') !!}
    {!! Html::style('css/comment.css') !!}
@endsection()

@section('content')
    @include('home.header')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>{{ trans('homepage.product_detail') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->

    @include('layouts.message')

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="{{ action('Home\HomeController@index') }}">
                                {{ trans('homepage.home_menu') }}
                            </a>
                            <a href="">{{ $category->name }}</a>
                            <a href="{{ action('Home\ProductController@show', ['id' => $product->id ]) }}">
                                {{ $product->name }}
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="{{ $product->image }}" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{ $product->name }}</h2>
                                    <div class="product-inner-price">
                                        <ins>
                                            {{ trans('homepage.dollar') . ' ' . $product->price }}
                                        </ins>
                                    </div>

                                    <div class="rating-chooser">
                                        <div class="col-lg-8" id="all-rate-product"
                                            name="all-rate-product"
                                            data-rating="{{ $product->rate_total / $product->rate_count }}">
                                        </div>
                                    </div>

                                    <div class="product-option-shop">
                                        <a class="btn-add-to-cart" data-product-id="{{ $product->id }}" rel="nofollow">
                                            {{ trans('homepage.add_to_cart') }}
                                        </a>
                                    </div>

                                    <hr>

                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                                                    {{ trans('homepage.review')}}
                                                </a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                                                    {{ trans('homepage.description') }}
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="profile">
                                                <h2>{{ trans('homepage.review')}}</h2>
                                                <div class="submit-review">
                                                {!! Form::open([
                                                    'route' => 'comment.store',
                                                    'id' => 'form-store-comment',
                                                    'data-confirm-title' => trans('homepage.confirm_title_store_review'),
                                                    'data-confirm-content' => trans('homepage.confirm_content_delete_item'),
                                                    'method' => 'POST'
                                                ]) !!}
                                                    <p>
                                                        {!! Form::label('name', trans('homepage.name')) !!}
                                                        {!! Form::text('name', Auth::user()->name, [
                                                            'class' => 'form-control review-name',
                                                            'readonly' => 'readonly',
                                                            'disabled' => 'disabled'
                                                        ]) !!}
                                                    </p>
                                                    <p>
                                                        {!! Form::label('email', trans('homepage.email')) !!}
                                                        {!! Form::email('email', Auth::user()->email, [
                                                            'class' => 'form-control review-email',
                                                            'readonly' => 'readonly',
                                                            'disabled' => 'disabled'
                                                        ]) !!}
                                                    </p>
                                                    <p>
                                                        {!! Form::label('content', trans('homepage.comment')) !!}
                                                        {!! Form::textarea('content', null, [
                                                            'class' => 'form-control review-content',
                                                            'cols' => 30,
                                                            'rows' => 10
                                                        ]) !!}

                                                        @if ($errors->has('content'))
                                                            <span class="help-block">
                                                                <strong>
                                                                    {{ $errors->first('content') }}
                                                                </strong>
                                                            </span>
                                                        @endif
                                                    </p>

                                                    <div class="rating-chooser">
                                                        <p>{{ trans('homepage.rating') }}</p>
                                                        <div class="col-lg-8" id="rate-product"
                                                            name="rate-product" data-rating="2.5"
                                                            data-product-id="{{ $product->id }}">
                                                        </div>
                                                        {!! Form::hidden('product_id', $product->id) !!}
                                                        {!! Form::hidden('user_id', Auth::user()->id) !!}

                                                        {!! Form::hidden('rate', 2.5, [
                                                            'id' => 'rate-product-value',
                                                        ]) !!}
                                                    </div>

                                                    {!! Form::close() !!}

                                                    <p>
                                                        {!! Form::button(trans('homepage.submit'), [
                                                            'class' => 'btn btn-primary review-submit',
                                                        ]) !!}
                                                    </p>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="home">
                                                <h2>
                                                    {{ trans('homepage.product_description') }}
                                                </h2>
                                                <p>{{ $product->description }}</p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.comment')
            </div>
            <div class="text-center">
                {!! $comments->render() !!}
            </div>
        </div>
    </div>

@endsection

@section('js')
    {!! Html::script('js/product-detail.js') !!}
    {!! Html::script('assets/JRate/jRate.js') !!}
    {!! Html::script('bower/toastr/toastr.js') !!}
@endsection

