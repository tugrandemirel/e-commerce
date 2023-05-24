<?php

namespace App\Providers;

use App\Enum\Brand\BrandEnum;
use Illuminate\Support\ServiceProvider;

class ViewShareProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (!$this->app->runningInConsole()) {
            $categories = \App\Models\Category::where('parent_id', 0)->get();
            view()->share('_categories', $categories);

            $brands = \App\Models\Brand::where('status', BrandEnum::STATUS_ACTIVE)->get();
            view()->share('_brands', $brands);
        }
    }
}
