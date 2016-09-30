@extends('layouts.app')

@section('css')
    {!! Html::style('bower/toastr/toastr.css') !!}
@endsection()

@section('content')
    @include('home.header')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>{{ trans('homepage.cart') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">{{ trans('homepage.search_product') }}</h2>
                        <form action="#">
                            <input type="text" placeholder="{{ trans('homepage.search-product') }} ..">
                            <input type="submit" value="{{ trans('homepage.search') }}">
                        </form>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <table cellspacing="0" class="shop-table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">{{ trans('homepage.product') }}</th>
                                        <th class="product-price">{{ trans('homepage.price') }}</th>
                                        <th class="product-quantity">{{ trans('homepage.quantity') }}</th>
                                        <th class="product-subtotal">{{ trans('homepage.total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $key => $cart)
                                    <tr class="cart-item" data-row-id="{{ $key }}">
                                        <td class="product-remove" data-cart-id="{{ $cart->id }}">
                                            <a title="{{ trans('homepage.remove-item') }}" class="remove" href="">×</a>
                                        </td>

                                        <td class="product-thumbnail" data-cart-id="{{ $cart->id }}">
                                            <a href="">
                                                <img width="145" height="145" alt="poster-1-up" class="shop-thumbnail" src="{{ $cart->options->image }}">
                                            </a>
                                        </td>

                                        <td class="product-name">
                                            <a href="">{{ $cart->name }}</a>
                                        </td>

                                        <td class="product-price">
                                            <span class="amount" data-price="{{ $cart->price }}" id="cart-price-{{ $cart->id }}">{{ $cart->price }} </span> {{ trans('homepage.dollar') }}
                                        </td>

                                        <td class="product-quantity">
                                            <div class="quantity buttons-added" data-cart-id="{{ $cart->id }}">
                                                <input type="button" class="minus" value="-">
                                                <input type="number" size="4" class="input-text qty text" title="Qty" value="{{ $cart->qty }}" min="0" step="1">
                                                <input type="button" class="plus" value="+">
                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount" id="amount-{{ $cart->id }}" data-subtotal="{{ floatval($cart->price) * intval($cart->qty) }}">{{ floatval($cart->price) * intval($cart->qty) }}</span> {{ trans('homepage.dollar') }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td class="actions" colspan="6">
                                            <input type="submit" value="Update Cart" name="update-cart" class="button">
                                            <input type="submit" value="Checkout" name="proceed" class="checkout-button button alt wc-forward">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="cart-collaterals">

                                <div class="cart-totals ">
                                    <h2>{{ trans('homepage.cart_total') }}</h2>

                                    <table cellspacing="0">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>{{ trans('homepage.cart_subtotal') }}</th>
                                                <td>
                                                    <span class="amount" id="sub-total-price" data-subtotal="{{ $subTotal }}">{{ $subTotal }}</span>
                                                    {{ trans('homepage.dollar') }}
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>{{ trans('homepage.shipping') }}</th>
                                                <td>{{ trans('homepage.free_ship') }}</td>
                                            </tr>

                                            <tr class="order-total">
                                                <th>{{ trans('homepage.order_total') }}</th>
                                                <td><strong><span class="amount" id="sub-total-order" data-subtotal="{{ $subTotal }}">
                                                    {{ $subTotal }}
                                                </span> {{ trans('homepage.dollar') }}</strong> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    {!! Html::script('js/cart.js') !!}
    {!! Html::script('bower/toastr/toastr.js') !!}
@endsection

