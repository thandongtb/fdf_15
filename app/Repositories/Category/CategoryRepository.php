<?php

namespace App\Repositories\Category;

use Auth;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\BaseRepository;
Use App\Repositories\Category\CategoryRepositoryInterface;
use DB;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category, Product $product)
    {
        $this->model = $category;
        $this->productModel = $product;
    }

    public function categoryExceptParent($limit, $id)
    {
        return $this->model->where('parent_id', '<>', $id)->paginate($limit);
    }

    public function getListCategories()
    {
        return $this->model->pluck('name', 'id');
    }

    public function findCategoryWithProduct($id)
    {
        return $this->model->with('products')->find($id);
    }

    public function deleteCategoryWithProduct($category)
    {
        DB::beginTransaction();

        try {
            $productsId = $category->products()->pluck('id');
            $this->productModel->whereIn('id', $productsId)->delete();
            $category->delete();

            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();

            return false;
        }
    }
}
