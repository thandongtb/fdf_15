<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use App\Repositories\User\UserRepository;
use App\Repositories\Item\ItemRepository;
use App\Repositories\Social\SocialRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Order\OrderRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Social\SocialRepositoryInterface;
Use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Item\ItemRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(UserRepositoryInterface::class, UserRepository::class);
        App::bind(SocialRepositoryInterface::class, SocialRepository::class);
        App::bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        App::bind(ProductRepositoryInterface::class, ProductRepository::class);
        App::bind(ItemRepositoryInterface::class, ItemRepository::class);
        App::bind(OrderRepositoryInterface::class, OrderRepository::class);
    }
}
