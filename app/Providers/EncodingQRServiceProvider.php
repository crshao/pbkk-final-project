<?php

namespace App\Providers;

use App\Services\EncodingQRService;
use Illuminate\Support\ServiceProvider;

class EncodingQRServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('encodingQR', EncodingQRService::class);
    }
}
