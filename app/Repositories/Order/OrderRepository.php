<?php

namespace App\Repositories\Order;

use Auth;
use App\Models\Order;
use App\Repositories\BaseRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use Cart;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function __construct(Order $order)
    {
        $this->model = $order;
    }

    public function storeOrder($request)
    {
        $order = new Order();
        $order['user_id'] = Auth::user()->id;
        $order['price'] = Cart::total();
        $order['name'] = $request->name;
        $order['email'] = $request->email;
        $order['phone'] = $request->phone;
        $order['status'] = config('common.order.status.unpaid');
        $order['shipping_address'] = $request->address;

        if (!$order->save()) {
            throw new Exception(trans('message.update_error'));
        }

        return $order;
    }

    public function orderDetails($id)
    {
        $order = $this->model->with('items', 'items.product')->find($id);

        return $order;
    }
}
