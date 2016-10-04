<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SuggestRequest;
use App\Services\ImageService;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use Auth;
use App\Repositories\Suggest\SuggestRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use Cart;

class SuggestController extends Controller
{
    private $suggestRepository;
    private $categoryRepository;
    private $productService;
    private $imageService;

    public function __construct(
        SuggestRepositoryInterface $suggestRepository,
        CategoryRepositoryInterface $categoryRepository,
        ProductService $productService,
        ImageService $imageService
    )
    {
        $this->suggestRepository = $suggestRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productService = $productService;
        $this->imageService = $imageService;
        $this->middleware('auth');
    }

    public function create()
    {
        $categories = $this->categoryRepository->getListCategories();
        $optionStatus = $this->productService->getOptions();
        $subTotal = Cart::subtotal();
        $totalCartItems = Cart::count();

        return view('home.suggest',
            compact('categories', 'optionStatus', 'subTotal', 'totalCartItems'));
    }

    public function store(SuggestRequest $request)
    {
        $suggest = $request->only('category_id', 'name', 'description');

        if ($request->hasFile('image')) {
            $file = $request->image;
            $suggest['image'] = $this->imageService->uploadCloud($file,
            config('common.path_cloud_product'), $request->name);
        }

        $suggest['user_id'] = Auth::user()->id;

        try {
            $this->suggestRepository->store($suggest);

            return redirect()->action('Home\HomeController@index')
                ->withSuccess(trans('homepage.suggest_success'));
        } catch (Exception $e) {

            return redirect()->action('Home\HomeController@index')
                ->withError(trans('homepage.suggest_error'));
        }
    }
}
