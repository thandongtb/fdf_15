<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

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

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        $input = $request->only('name', 'description');

        if ($this->categoryRepository->create($input)) {
            return redirect()->route('category.index')->with('success', trans('category.create_category_successfully'));
        }

        return redirect()->route('category.index')->with('errors', trans('category.create_category_fail'));
    }

    public function show($id)
    {
        $category = $this->categoryRepository->find($id);

        if (!$category) {
            return redirect()->route('category.index')->with('errors', trans('category.category_not_found'));
        }

        return view('admin.category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        if (!$category) {
            return redirect()->route('category.index')->with('errors', trans('category.category_not_found'));
        }

        return view('admin.category.edit', compact('category'));
    }

    public function update($id, UpdateCategoryRequest $request)
    {
        $input = $request->only('name', 'description');

        if ($this->categoryRepository->update($input, $id)) {
            return redirect()->route('category.index')->with('success', trans('category.update_category_successfully'));
        }

        return redirect()->route('category.index')->with('errors', trans('category.update_category_fail'));
    }
}
