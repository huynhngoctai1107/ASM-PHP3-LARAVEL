<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
 
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        view()->composer('client.header.navbar','App\Http\Composers\QuantityComposer');
    
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       
    }

     
}
