<?php

namespace App\Services;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Socialite;
use Auth;

class ProductService
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

    public function getOptions()
    {
        foreach (config('common.product.status') as $key => $value) {
            $optionStatus[$value] = trans('product.' . $key);
        }

        return $optionStatus;
    }
}
