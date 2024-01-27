<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\TagObserver;
use App\Observers\ProductObserver;
use App\Models\Product;
use App\Models\Tag;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Product::observe(ProductObserver::class);
        Tag::observe(TagObserver::class);
    }
}
