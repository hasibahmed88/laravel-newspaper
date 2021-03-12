<?php

namespace App\Providers;

use App\Models\Admin\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View()->composer('front.*',function($view){
            $view->categories    =  Category::where('status',1)->get();
            
        });
    }
}
