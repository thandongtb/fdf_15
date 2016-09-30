<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Http\Requests;
use App\Models\User;
use App\Http\Controllers\Controller;
use Cart;

class HomeController extends Controller
{
    private $userRepository;
    private $productRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        ProductRepositoryInterface $productRepository
    ) {
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        $products = $this->productRepository->getAllProdcuts();
        $subTotal = Cart::subtotal();
        $totalCartItems = Cart::count();

        return view('home.home', compact('products', 'totalCartItems', 'subTotal'));
    }
}
