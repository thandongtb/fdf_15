<?php
namespace App\Repositories\Item;

use Auth;
use App\Models\Item;
use App\Repositories\BaseRepository;
use App\Repositories\Item\ItemRepositoryInterface;
use Cart;
use DB;
use Carbon\Carbon;

class ItemRepository extends BaseRepository implements ItemRepositoryInterface
{
    public function __construct(Item $item)
    {
        $this->model = $item;
    }

    public function save($orderId)
    {
        $products = Cart::content();
        $item = [];

        foreach ($products as $product) {
            $item[] = [
                'product_id' => $product->id,
                'order_id' => $orderId,
                'quantity' => $product->qty,
                'price' => $product->price,
                'status' => config('common.item.status.unpaid'),
            ];
        }

        if ($this->model->insert($item)) {
            return $this->findBy('order_id', $orderId);
        }
    }
}
