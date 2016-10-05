<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Item\ItemRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Http\Requests;
use App\Services\ChatworkService;
use Cart;
use Mail;
use Auth;
use DB;

class OrderController extends Controller
{
    private $productRepository;
    private $orderRepository;
    private $itemRepository;
    private $chatworkService;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        OrderRepositoryInterface $orderRepository,
        ItemRepositoryInterface $itemRepository,
        ChatworkService $chatworkService
    ) {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
        $this->itemRepository = $itemRepository;
        $this->chatworkService = $chatworkService;
        $this->middleware('auth');
    }

    public function index()
    {
        $carts = Cart::content();
        $subTotal = Cart::subtotal();
        $totalCartItems = Cart::count();

        return view('home.order', compact('carts', 'totalCartItems', 'subTotal'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $order = $this->orderRepository->storeOrder($request);
            $orderId = $order->id;
            $items = $this->itemRepository->save($orderId);

            foreach ($items as $key => $item) {
                $product = $this->productRepository->find($item->product_id);
                $quantityChange = $product->quantity - $item->quantity;
                $this->productRepository->update(['quantity' => $quantityChange], $product->id);
            }

            DB::commit();

            $this->chatworkService->sendMessageToRoom(trans('homepage.buy_success'));

            Mail::send('emails.order', ['order' => $order, 'items' => $items], function ($message) {
                $message->to(Auth::user()->email)->subject(trans('homepage.order_info'));
            });
            Cart::destroy();
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return redirect()->action('Home\OrderController@show', [$order->id]);
    }

    public function show($id)
    {
        $carts = Cart::content();
        $subTotal = Cart::subtotal();
        $totalCartItems = Cart::count();
        $order = $this->orderRepository->orderDetails($id);

        if (is_null($order)) {
            return redirect()->action('Home\OrderController@index')
                ->withErrors(trans('homepage.message.find_order_fail'));
        }

        return view('home.checkout_success', compact('order', 'carts', 'subTotal', 'totalCartItems'));
    }
}
