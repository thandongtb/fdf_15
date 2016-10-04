<?php
namespace App\Repositories\Product;

use Auth;
use App\Models\Product;
use App\Models\Comment;
use App\Repositories\BaseRepository;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $product, Comment $comment)
    {
        $this->model = $product;
        $this->commentModel = $comment;
    }

    public function orderBy($column, $option)
    {
        return $this->model->orderBy($column, $option);
    }

    public function getAllProdcuts()
    {
        return $this->model->with('category')
            ->paginate(config('paginate.product.normal'));
    }

    public function getProductsByCategory($categoryId)
    {
        return $this->model->where('category_id', $categoryId)
            ->paginate(config('paginate.product.normal'));
    }

    public function getAllComments($id)
    {
        return $this->commentModel->with('user')
            ->where('product_id', $id)
            ->orderby('created_at', 'desc')
            ->paginate(config('paginate.product.normal'));
    }
}
