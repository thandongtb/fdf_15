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
        <div class="zigzag-bottom">
            <div class="row">
                <ul class="simplefilter text-center">
                @if ($type == config('common.filter.all'))
                    <a href="{{ action('Home\HomeController@index', [
                        'type' => config('common.filter.all')
                    ]) }}">
                        <li class="active" data-filter="{{ config('common.filter.all') }}">
                        {{ trans('homepage.all') }}
                        </li>
                    </a>
                @else
                    <a href="{{ action('Home\HomeController@index', [
                        'type' => config('common.filter.all')
                    ]) }}">
                        <li data-filter="{{ config('common.filter.all') }}">
                        {{ trans('homepage.all') }}
                        </li>
                    </a>
                @endif

                @if ($type == config('common.filter.best_price'))
                    <a href="{{ action('Home\HomeController@index', [
                        'type' => config('common.filter.best_price')
                    ]) }}">
                        <li class="active" data-filter="{{ config('common.filter.best_price') }}">
                        {{ trans('homepage.best_price') }}
                        </li>
                    </a>
                @else
                    <a href="{{ action('Home\HomeController@index', [
                        'type' => config('common.filter.best_price')
                    ]) }}">
                        <li data-filter="{{ config('common.filter.best_price') }}">
                        {{ trans('homepage.best_price') }}
                        </li>
                    </a>
                @endif

                @if ($type == config('common.filter.best_selling'))
                    <a href="{{ action('Home\HomeController@index', [
                        'type' => config('common.filter.best_selling')
                    ]) }}">
                        <li class="active" data-filter="{{ config('common.filter.best_selling') }}">
                        {{ trans('homepage.best_selling') }}
                        </li>
                    </a>
                @else
                    <a href="{{ action('Home\HomeController@index', [
                        'type' => config('common.filter.best_selling')
                    ]) }}">
                        <li data-filter="{{ config('common.filter.best_selling') }}">
                        {{ trans('homepage.best_selling') }}
                        </li>
                    </a>
                @endif
                </ul>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
            @foreach ($products as $key => $product)
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{ $product->product ? $product->product->image :
                                $product->image }}"
                                alt="" class="img-product-show">
                        </div>
                        <h2>
                            <a href="{{ action('Home\ProductController@show', [
                                'id' => $product->product ?
                                    $product->product->id : $product->id
                                ]) }}">
                                {{ $product->product ? $product->product->name : $product->name }}
                            </a>
                        </h2>
                        <div class="rating-chooser">
                            <div class="col-lg-8 all-rate-product"
                                id="all-rate-product-{{
                                    $product->product ? $product->product->id : $product->id
                                }}"
                                name="all-rate-product"
                                data-rating="{{ $product->rate_count == 0 ? 0 :
                                $product->rate_total / $product->rate_count }}">
                            </div>
                        </div>
                        <div class="product-carousel-price text-price">
                            <ins>
                                {{ trans('homepage.dollar') }}
                                {{ $product->product ? $product->product->price : $product->price }}
                            </ins>
                        </div>

                        <div class="product-option-shop">
                            <a class="btn-add-to-cart" data-product-id="{{
                                $product->product ? $product->product->id : $product->id
                            }}" rel="nofollow">
                                {{ trans('homepage.add_to_cart') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach()
            </div>

            {!! $products->appends(array_except(Request::query(),
            'page'))->render() !!}
        </div>
    </div>

@endsection

@section('js')
    {!! Html::script('js/homepage.js') !!}
    {!! Html::script('bower/toastr/toastr.js') !!}
    {!! Html::script('assets/JRate/jRate.js') !!}
    {!! Html::script('bower/filterizr/dist/jquery.filterizr.min.js') !!}
@endsection

