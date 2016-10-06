<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Suggest\SuggestRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class SuggestController extends Controller
{
    private $suggestRepository;
    private $categoryRepository;

    public function __construct(
        SuggestRepositoryInterface $suggestRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->suggestRepository = $suggestRepository;
        $this->categoryRepository = $categoryRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        $suggests = $this->suggestRepository->getAllSuggests();

        return view('admin.suggest.index', compact('suggests'));
    }
}
