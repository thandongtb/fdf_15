<?php

namespace App\Services;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class OrderService
{
    protected $orderRepository;

    public function __construct(
        OrderRepositoryInterface $OrderRepository
    ) {
        $this->orderRepository = $OrderRepository;
    }

    public function getOptions()
    {
        foreach (config('common.order.status') as $key => $value) {
            $optionStatus[$value] = trans('order.' . $key);
        }

        return $optionStatus;
    }
}
