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
                        <h2>{{ trans('homepage.checkout_your_order') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->

    <div class="single-product-area">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('homepage.paid_information') }}
                </div>
                <div class="panel-body text-center">

                    <div class="check_success">
                        <h1><i class="fa fa-check"></i></h1>
                        <h3>{{ trans('homepage.order_successful') }}</h3>
                        <br>
                        <p>{{ trans('homepage.check_mail') }}</p>
                        <hr>
                    </div>
                    <div class="woocommerce-info">
                        <a class="showlogin"
                            data-toggle="collapse" href="#order-detail" aria-expanded="false"
                            aria-controls="login-form-wrap">{{ trans('homepage.detail_order') }}
                        </a>
                    </div>

                    <div id="order-detail" class="login collapse">
                        <h3>{{ trans('homepage.order_info') }}</h3>
                        <table class="table table-responsive">
                            <tbody>
                                <tr>
                                    <td>{{ trans('homepage.customer_name') }}</td>
                                    <td>{{ $order->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('homepage.customer_address') }}</td>
                                    <td>{{ $order->shipping_address }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('homepage.total_title') }}</td>
                                    <td>{{ $order->price . ' ' . trans('homepage.dollar')}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <h3>{{ trans('homepage.item_list') }}</h3>
                        <table cellspacing="0" class="shop-table cart">
                            <thead>
                                <tr>
                                    <th class="product-image">{{ trans('homepage.image') }}</th>
                                    <th class="product-name">{{ trans('homepage.product') }}</th>
                                    <th class="product-price">{{ trans('homepage.price') }}</th>
                                    <th class="product-quantity">{{ trans('homepage.quantity') }}</th>
                                </tr>
                            </thead>

                            <tbody id="shopping-cart-body">
                                @foreach ($order->items as $key => $item)
                                <tr class="cart-item">
                                    <td class="product-image">
                                        <img src="{{ $item->product->image }}"/>
                                    </td>

                                    <td class="product-name">
                                        <a href="">{{ $item->product->name }}</a>
                                    </td>

                                    <td class="product-price">
                                        <span class="amount">{{ $item->product->price }} </span>
                                        {{ trans('homepage.dollar') }}
                                    </td>

                                    <td class="product-quantity">
                                        {{ $item->quantity  }}
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="clear"></div>
                    </div>

                    <a href="{{ action('Home\HomeController@index') }}" class="btn btn-primary">
                        {{ trans('homepage.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {!! Html::script('js/order.js') !!}
    {!! Html::script('bower/toastr/toastr.js') !!}
@endsection

