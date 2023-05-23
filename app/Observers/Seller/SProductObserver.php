<?php

namespace App\Observers\Seller;

use App\Models\Product;
use Illuminate\Support\Str;

class SProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        $product->meta_title = $product->meta_title ? $product->meta_title : $product->title;
        $product->meta_description = $product->meta_description ? $product->meta_description : $product->short_description;
        $product->slug = Str::slug($product->title);
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        $product->meta_title = $product->meta_title ? $product->meta_title : $product->title;
        $product->meta_description = $product->meta_description ? $product->meta_description : $product->short_description;
        $product->slug = Str::slug($product->title);
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
