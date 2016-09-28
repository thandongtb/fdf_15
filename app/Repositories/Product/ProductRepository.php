<?php
namespace App\Repositories\Product;

use Auth;
use App\Models\Product;
use App\Repositories\BaseRepository;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function orderBy($column, $option)
    {
        return $this->model->orderBy($column, $option);
    }

    public function getAllProdcuts()
    {
        return $this->model->with('category')->paginate(config('paginate.product.normal'));
    }
}
