<?php

namespace App\Repositories\Category;

use Auth;
use App\Models\Category;
use App\Repositories\BaseRepository;
Use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }
}
