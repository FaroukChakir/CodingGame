<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CategoryProductRepository;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryProduct;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepository::class, function ($app) {
            return new ProductRepository(new Product());
        });
        $this->app->bind(CategoryRepository::class, function ($app) {
            return new CategoryRepository(new Category());
        });
        $this->app->bind(CategoryProductRepository::class, function ($app) {
            return new CategoryProductRepository(new CategoryProduct());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
