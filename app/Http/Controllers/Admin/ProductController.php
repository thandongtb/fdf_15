<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use Cloudder;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getAllProdcuts();

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getListCategories();

        foreach (config('common.product.status') as $key => $value) {
            $optionStatus[$value] = trans('product.' . $key);
        }

        return view('admin.product.create', compact('categories', 'optionStatus'));
    }

    public function store(CreateProductRequest $request)
    {
        $product = $request->only('name', 'description', 'image', 'price', 'category_id', 'quantity', 'status');

        if ($request->hasFile('image')) {
            $fileName = $request->image;
            Cloudder::upload($fileName, config('common.path_cloud_product') . $request->name);
            $product['image'] = Cloudder::getResult()['url'];
        }

        if ($this->categoryRepository->create($product)) {
            return redirect()->action('Admin\ProductController@index')
                ->withSuccess(trans('product.create_product_successfully'));
        }

        return redirect()->action('Admin/ProductController@edit')
                ->withErrors(trans('product.create_product_fail'));
    }
}
