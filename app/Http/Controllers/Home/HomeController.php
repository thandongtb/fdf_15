<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Item\ItemRepositoryInterface;
use App\Http\Requests;
use App\Models\User;
use App\Http\Controllers\Controller;
use Cart;

class HomeController extends Controller
{
    private $userRepository;
    private $productRepository;
    private $itemRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        ProductRepositoryInterface $productRepository,
        ItemRepositoryInterface $itemRepository
    ) {
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->itemRepository = $itemRepository;
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $type = $request->input('type') ? $request->input('type')
            : config('common.filter.all');

        switch ($type) {
            case config('common.filter.best_price'):
                $products = $this->productRepository->getBestPrice();
                break;

            case config('common.filter.best_selling'):
                $products = $this->itemRepository->orderByBestSelling();
                break;

            default:
                $products = $this->productRepository->getAllProdcuts();
                break;
        }

        $subTotal = Cart::subtotal();
        $totalCartItems = Cart::count();

        return view('home.home', compact('products', 'totalCartItems', 'subTotal', 'type'));
    }
}
