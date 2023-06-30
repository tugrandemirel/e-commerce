<?php

namespace App\Jobs;

use App\Enum\Cart\CartEnum;
use App\Enum\Product\ProductEnum;
use App\Models\Bid;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Notifications\AuctionEndNotification;
use App\Notifications\SellerAuctionEndNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckProductAuctionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $products = Product::where('end_date', '=', now()->format('Y-m-d'))
                    ->where('stock', ProductEnum::STOCK_ACTIVE)
                    ->where('visibility', ProductEnum::VISIBILITY_ACTIVE)
                    ->where('approve', ProductEnum::APPROVAL_APPROVED)
                    ->get();

        foreach($products as $product)
        {
            $highestBid = Bid::where('product_id', $product->id)
                ->orderBy('bid_price', 'desc')
                ->first();
            // En yüksek teklifi veren kullanıcının teklifini al

            if($highestBid)
            {
               //user bilgileri
                $highestBid->update([
                    'expired_at' => now(),
                ]);
                $user = User::where('id', $highestBid->user_id)->first();
                $data = [
                    'user' => $user,
                    'bid' => $highestBid,
                ];
               $cart =  Cart::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'bid_price' => $highestBid->bid_price,
                    'product_price' => $product->price,
                    'status' => CartEnum::STATUS_PENDING
                ]);
                $product->update([
                    'stock' => ProductEnum::STOCK_PASSIVE,
                ]);

                $user->notify(new AuctionEndNotification($data));
                $seller = $product->seller;
                $seller->notify(new SellerAuctionEndNotification($data));
            }
        }
    }
}
