@extends('layouts.admin')

@section('title')
    {{ trans('order.detail_order') }}
@endsection

@section('style')
    {!! Html::style('css/home.css') !!}
@endsection
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">
                {{ trans('order.detail_order') }}
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel-body">
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
                <a href="{{ action('Admin\OrderController@index') }}" class="btn btn-primary">
                    {{ trans('homepage.back') }}
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection
