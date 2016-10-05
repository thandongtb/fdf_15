<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Services\ProductService;
use App\Services\ImageService;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $productService;
    protected $imageService;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        ProductService $productService,
        ImageService $imageService
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productService = $productService;
        $this->imageService = $imageService;
    }

    public function index()
    {
        $products = $this->productRepository->getAllProdcuts();

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getListCategories();
        $optionStatus = $this->productService->getOptions();

        return view('admin.product.create', compact('categories', 'optionStatus'));
    }

    public function store(CreateProductRequest $request)
    {
        $product = $request->only('name', 'description', 'image', 'price', 'category_id', 'quantity', 'status');

        if ($request->hasFile('image')) {
            $file = $request->image;
            $product['image'] = $this->imageService->uploadCloud($file,
                config('common.path_cloud_product'), $request->name);
        }

        if ($this->productRepository->create($product)) {
            return redirect()->action('Admin\ProductController@index')
                ->withSuccess(trans('product.create_product_successfully'));
        }

        return redirect()->action('Admin/ProductController@edit')
                ->withErrors(trans('product.create_product_fail'));
    }

    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (!$product) {
            return redirect()->route('product.index')->withErrors(trans('product.product_not_found'));
        }

        return view('admin.product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        $categories = $this->categoryRepository->getListCategories();
        $optionStatus = $this->productService->getOptions();

        if (!$product) {
            return redirect()->route('product.index')->withErrors(trans('product.product_not_found'));
        }

        return view('admin.product.edit', compact('product', 'categories', 'optionStatus'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = $request->only('name', 'description', 'price', 'category_id', 'quantity', 'status');

        if ($request->hasFile('image')) {
            $file = $request->image;
            $product['image'] = $this->imageService->uploadCloud($file, $request->name);
        }

        if ($this->productRepository->update($product, $id)) {
            return redirect()->route('product.index')->with('success',
                trans('product.create_product_successfully')
            );
        }

        return redirect()->route('product.index')->withError(trans('product.create_product_fail'));
    }

    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (!$product) {
            return redirect()->route('product.index')->withErrors(trans('product.product_not_found'));
        }

        if ($product->delete()) {
            return redirect()->route('product.index')->withSuccess(trans('product.delete_product_successfully'));
        }

        return redirect()->route('product.index')->withErrors(trans('product.delete_product_fail'));
    }
}
