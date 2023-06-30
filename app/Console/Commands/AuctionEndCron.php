<?php

namespace App\Console\Commands;

use App\Jobs\CheckProductAuctionJob;
use Illuminate\Console\Command;

class AuctionEndCron extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auction-end-cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Açık arttırma süresi dolan ürünleri kontrol eder ve açık artırması biten ürünleri kullanıcının sepetine ekler.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        CheckProductAuctionJob::dispatch();
    }
}
