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
                        <h2>{{ trans('homepage.checkout_your_order') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            @if ($totalCartItems)
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <div class="woocommerce-info text-center">
                                <a href="{{ action('Home\ShoppingCartController@index') }}">
                                    {{ trans('homepage.reivew_your_cart') }}
                                </a>
                            </div>

                            {!! Form::open([
                                'action' => ['Home\OrderController@store'],
                                'name' => 'checkout',
                                'class' => 'form-store-order checkout',
                                'method' => 'POST'
                            ]) !!}
                                <h3 id="order-review-heading">{{ trans('homepage.your_order') }}</h3>
                                <div id="order-review">
                                    <table class="shop-table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">{{ trans('homepage.product_title') }}</th>
                                                <th class="product-total">{{ trans('homepage.total_title') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="cart-item">
                                                <th>{{ trans('homepage.cart_subtotal') }}</th>
                                                <td>
                                                    <span class="amount" id="sub-total-price" data-subtotal="{{ $subTotal }}">{{ $subTotal }}</span>
                                                    {{ trans('homepage.dollar') }}
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>{{ trans('homepage.shipping') }}</th>
                                                <td>{{ trans('homepage.free_ship') }}</td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>{{ trans('homepage.order_total') }}</th>
                                                <td><strong><span class="amount" id="sub-total-order" data-subtotal="{{ $subTotal }}">
                                                    {{ $subTotal }}
                                                </span> {{ trans('homepage.dollar') }}</strong> </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div id="customer-details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>{{ trans('homepage.customer_info') }}</h3>

                                            <p id="billing-first-name-field" class="form-row form-row-first validate-required">
                                                {!! Form::label('name', trans('homepage.customer_name')) !!}
                                                {!! Form::text('name', Auth::user()->name, [
                                                    'class' => 'input-text',
                                                    'placeholder' => trans('homepage.customer_name'),
                                                ]) !!}
                                            </p>

                                            <p id="billing-email-field" class="form-row form-row-first validate-required validate-email">

                                                {!! Form::label('email', trans('homepage.email_address')) !!}
                                                {!! Form::text('email', Auth::user()->email, [
                                                    'class' => 'input-text',
                                                    'placeholder' => trans('homepage.email_address'),
                                                    'readonly' => 'readonly',
                                                ]) !!}
                                            </p>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="woocommerce-shipping-fields">
                                            <h3>{{ trans('customer_address') }}</h3>
                                            <div class="shipping-address">
                                                <p id="billing-address-1-field" class="form-row form-row-wide address-field validate-required">
                                                    {!! Form::label('address', trans('homepage.address')) !!}
                                                    {!! Form::text('address', Auth::user()->address, [
                                                        'class' => 'input-text',
                                                        'placeholder' => trans('homepage.address'),
                                                    ]) !!}
                                                </p>
                                                <div class="clear"></div>
                                                <p id="billing-phone-field" class="form-row form-row-last validate-required validate-phone">
                                                    {!! Form::label('phone', trans('homepage.phone')) !!}
                                                    {!! Form::text('phone', Auth::user()->phone, [
                                                        'class' => 'input-text',
                                                        'placeholder' => trans('homepage.phone'),
                                                    ]) !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                            <div id="order-review">
                                <div id="payment">

                                    <div class="form-row place-order text-center">
                                        <button class="btn btn-primary btn-order-submit"
                                            data-title="{{ trans('homepage.order_submit') }}"
                                            data-content="{{ trans('homepage.order_confirm') }}">
                                            {{ trans('homepage.place_order') }}
                                        </button>
                                    </div>

                                    <div class="clear"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        {{ trans('homepage.no_cart') }}
                    </div>
                    <div class="panel-body text-center">
                        <div class="check_no_cart">
                            <h1><i class="fa fa-check"></i></h1>
                            <h3>{{ trans('homepage.no_cart') }}</h3>
                            <br>
                            <a href="{{ action('Home\HomeController@index') }}">{{ trans('homepage.go_home') }}</a>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

@endsection

@section('js')
    {!! Html::script('js/order.js') !!}
    {!! Html::script('bower/toastr/toastr.js') !!}
@endsection

