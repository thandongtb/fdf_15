<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoriesController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->paginate(config('paginate.category.normal'));

        return view('admin.category.index', compact('categories'));
    }

    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);

        if (!$category) {
            return redirect()->route('category.index')->with('errors', trans('category.category_not_found'));
        }

        if ($category->delete()) {
            return redirect()->route('category.index')->with('success', trans('category.delete_category_successfully'));
        }

        return redirect()->route('category.index')->with('errors', trans('category.delete_category_fail'));
    }
}
