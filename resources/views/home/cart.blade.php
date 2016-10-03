@extends('layouts.app')

@section('css')
    {!! Html::style('bower/toastr/toastr.css') !!}
@endsection()

@section('content')
    @include('home.header')

    @include('layouts.errors')

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
                <div class="col-md-8 col-md-offset-2">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <table cellspacing="0" class="shop-table cart"
                                data-confirm-title="{{ trans('homepage.confirm_title_update_cart') }}"
                                data-confirm-content="{{ trans('homepage.confirm_content_update_cart') }}"
                                data-confirm-delete-title="{{ trans('homepage.confirm_title_delete_item') }}"
                                data-confirm-detele-content="{{ trans('homepage.confirm_content_delete_item') }}">
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

                                <tbody id="shopping-cart-body">
                                    {!! Form::open([
                                        'route' => ['cart.update', 1],
                                        'class' => 'form-update-cart',
                                        'method' => 'PATCH'
                                    ]) !!}
                                    @foreach ($carts as $key => $cart)
                                    <tr class="cart-item" data-row-id="{{ $key }}" id="cart-item-{{ $key }}">
                                        <td class="product-remove" data-cart-id="{{ $cart->id }}">
                                            <a title="{{ trans('homepage.remove-item') }}" class="remove remove-item" href="" data-row-id="{{ $key }}">×</a>
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
                                            <span class="amount" data-price="{{ $cart->price }}" id="cart-price-{{ $cart->id }}">
                                                {{ $cart->price }}
                                            </span>
                                            {{ trans('homepage.dollar') }}
                                        </td>

                                        <td class="product-quantity">
                                            <div class="quantity buttons-added" data-cart-id="{{ $cart->id }}">
                                                {!! Form::button('-', [
                                                    'class' => 'minus',
                                                ]) !!}

                                                {!! Form::number($key, $cart->qty, [
                                                    'class' => 'input-text qty text',
                                                    'title' => 'Qty',
                                                    'size' => 4,
                                                    'step' => 1,
                                                ]) !!}
                                                {!! Form::button('+', [
                                                    'class' => 'plus',
                                                ]) !!}
                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount" id="amount-{{ $cart->id }}" data-subtotal="{{ floatval($cart->price) * intval($cart->qty) }}">
                                                {{ floatval($cart->price) * intval($cart->qty) }}
                                            </span>
                                            {{ trans('homepage.dollar') }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    {!! Form::close() !!}
                                    <tr>
                                        <td class="actions" colspan="6">
                                            {!! Form::button(trans('homepage.update_cart'), [
                                                'class' => 'btn-update-cart btn btn-primary',
                                                'value' => trans('homepage.update_cart'),
                                                'name' => 'update-cart',
                                            ]) !!}
                                            {!! Form::button(trans('homepage.checkout'), [
                                                'class' => 'checkout-button button alt wc-forward btn btn-success',
                                                'value' => trans('homepage.checkout'),
                                                'name' => 'proceed',
                                            ]) !!}
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

