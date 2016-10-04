@extends('layouts.app')

@section('css')
    {!! Html::style('css/user.css') !!}
@endsection()

@section('content')

@include('home.header')

<div id="page-wrapper">
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>{{ trans('admin/users.all_products_of_category') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area <--></-->
    @include('layouts.message')
    <hr>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-category-information">
                                <tbody>
                                    <tr>
                                        <td>{{ trans('category.id') }}:</td>
                                        <td>{{ $category->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('category.name') }}:</td>
                                        <td>{{ $category->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('category.description') }}:</td>
                                        <td>{{ $category->description }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <h2><a href="{{ action('Home\ProductController@show', [
                            'id' => $product->id
                        ]) }}">{{ $product->name }}</a></h2>
                        <div class="rating-chooser">
                            <div class="col-lg-8 all-rate-product"
                                id="all-rate-product-{{ $product->id }}"
                                name="all-rate-product"
                                data-rating="{{ $product->rate_count == 0 ? 0 :
                                $product->rate_total / $product->rate_count }}">
                            </div>
                        </div>
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
</div>

@endsection

@section('js')
    {!! Html::script('js/show-category.js') !!}
    {!! Html::script('assets/JRate/jRate.js') !!}
@endsection
