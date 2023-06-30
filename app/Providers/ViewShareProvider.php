<?php

namespace App\Providers;

use App\Enum\Brand\BrandEnum;
use App\Enum\Page\PageEnum;
use App\Enum\Product\ProductEnum;
use App\Models\Bid;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;
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


            $_headerPages = Page::where('header', PageEnum::PAGE_HEADER)
                ->where('is_active', PageEnum::PAGE_IS_ACTIVE)
                ->get();
            view()->share('_headerPages', $_headerPages);

            $_footerPages = Page::where('footer', PageEnum::PAGE_FOOTER)
                ->where('is_active', PageEnum::PAGE_IS_ACTIVE)
                ->get();
            view()->share('_footerPages', $_footerPages);

            $_navbarPages = Page::where('footer', PageEnum::PAGE_FOOTER)
                ->where('is_active', PageEnum::PAGE_IS_ACTIVE)
                ->get();

            view()->share('_navbarPages', $_navbarPages);
        }
    }
}
