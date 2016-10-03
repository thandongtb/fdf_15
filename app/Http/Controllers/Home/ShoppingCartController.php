<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Cart;

class ShoppingCartController extends Controller
{
    protected $productRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $carts = Cart::content();
        $subTotal = Cart::subtotal();
        $totalCartItems = Cart::count();

        return view('home.cart', compact('carts', 'totalCartItems', 'subTotal'));
    }

    public function store(Request $request)
    {
        try {
            $product = $this->productRepository->find($request->id);

            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price,
                'options' => [
                    'image' => $product->image,
                ],
            ]);
            $totalCartItems = Cart::count();
            $subTotal = Cart::subtotal();

            return Response::json([
                'success' => true,
                'message' => trans('homepage.message.add_to_cart_success'),
                'total_price' => $subTotal,
                'total_prodcut' => $totalCartItems,
            ]);
        } catch (ModelNotFoundException $e) {
            return Response::json([
                'success' => false,
                'message' => trans('homepage.message.add_to_cart_fail'),
            ]);
        }
    }

    public function update(Request $request)
    {
        $data = $request->except('_method', '_token');

        foreach ($data as $rowId => $quantity) {
            $quantity = intval($quantity);
            Cart::update($rowId, $quantity);
        }

        return redirect()->action('Home\ShoppingCartController@index')
            ->withSuccess(trans('homepage.message.update_cart_success'));
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);

        return Response::json([
            'success' => true,
            'message' => trans('homepage.message.delete_cart_success'),
        ]);
    }
}
