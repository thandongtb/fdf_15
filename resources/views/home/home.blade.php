@extends('layouts.app')

@section('css')
    {!! Html::style('bower/toastr/toastr.css') !!}
@endsection()

@section('content')
    @include('home.header')
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>{{ trans('homepage.free_ship') }}</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>{{ trans('homepage.secure_payment') }}</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>{{ trans('homepage.new_product') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->

    @include('layouts.message')

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
            @foreach ($products as $key => $product)
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{ $product->image }}" alt="" class="img-product-show">
                        </div>
                        <h2><a href="{{ action('Home\ProductController@show', ['id' => $product->id ]) }}">{{ $product->name }}</a></h2>
                        <div class="product-carousel-price text-price">
                            <ins>{{ trans('homepage.dollar') . $product->price }}</ins>
                        </div>

                        <div class="product-option-shop">
                            <a class="btn-add-to-cart" data-product-id="{{ $product->id }}" rel="nofollow">
                                {{ trans('homepage.add_to_cart') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach()
            </div>

            {!! $products->render() !!}
        </div>
    </div>

@endsection

@section('js')
    {!! Html::script('js/homepage.js') !!}
    {!! Html::script('bower/toastr/toastr.js') !!}
@endsection

