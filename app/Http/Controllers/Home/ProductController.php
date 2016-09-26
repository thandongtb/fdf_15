<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Services\ProductService;
use Cart;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $productService;
    protected $imageService;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        ProductService $productService
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productService = $productService;
        $this->middleware('auth');
    }

    public function show($id)
    {
        $product = $this->productRepository->find($id);
        $subTotal = Cart::subtotal();
        $totalCartItems = Cart::count();
        $comments = $this->productRepository->getAllComments($id);

        if ($product) {
            $category = $this->categoryRepository->find($product->category_id);

            return view('home.product-detail',
                compact('product', 'category','subTotal', 'totalCartItems', 'comments'));
        }

        return redirect()->route('product.index')
            ->withErrors(trans('product.product_not_found'));
    }
}
