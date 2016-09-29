@extends('layouts.app')

@section('content')
    <div class="site-branding-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="logo col-lg-offset-2">
                        <h1>
                            <a href="">
                                <img src="https://www.foodbankccs.org/images/logos/for-download/FBCCS-Logo.png" class="img-logo">
                            </a>
                        </h1>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="shopping-item">
                        <a href="cart.html">{{ trans('homepage.cart') }} - <span class="cart-amunt">$100</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only"{{ trans('homepage.toggle') }}</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ action('Home\HomeController@index') }}">{{ trans('homepage.home') }}</a></li>
                        <li><a href="">{{ trans('homepage.shop_page') }}</a></li>
                        <li><a href="">{{ trans('homepage.cart') }}</a></li>
                        <li><a href="">{{ trans('homepage.checkout') }}</a></li>
                        <li><a href="">{{ trans('homepage.category') }}</a></li>
                        <li><a href="">{{ trans('suggestion') }}</a></li>
                        <li><a href="">{{ trans('homepage.contact') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->

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
                        <h2><a href="">{{ $product->name }}</a></h2>
                        <div class="product-carousel-price text-price">
                            <ins>{{ trans('homepage.dollar') . $product->price }}</ins>
                        </div>

                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="{{ $product->quantity }}"  data-product-id="{{ $product->id }}" rel="nofollow" href="">{{ trans('homepage.add_to_cart') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach()
            </div>

            {!! $products->render() !!}
        </div>
    </div>

    @endsection

