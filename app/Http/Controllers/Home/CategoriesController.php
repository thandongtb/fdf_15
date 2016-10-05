<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Cart;

class CategoriesController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->paginate(config('paginate.category.normal'));
        $subTotal = Cart::subtotal();
        $totalCartItems = Cart::count();

        return view('home.list-category',
            compact('categories', 'subTotal', 'totalCartItems'));
    }

    public function show($id)
    {
        $category = $this->categoryRepository->find($id);

        if (!$category) {
            return redirect()->action('Admin\CategoriesController@index')
                ->withErrors(trans('category.category_not_found'));
        }

        $products = $this->productRepository->getProductsByCategory($category->id);
        $subTotal = Cart::subtotal();
        $totalCartItems = Cart::count();

        return view('home.show-category',
            compact('category', 'subTotal', 'totalCartItems', 'products'));
    }
}
