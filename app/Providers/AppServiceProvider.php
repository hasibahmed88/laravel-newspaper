<?php

namespace App\Providers;

use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;
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
            $view->categories   =  Category::where('status',1)->get();
            $view->recent       =  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name')
                                    ->where('news.status',1)
                                    ->take(5)
                                    ->orderBy('news.id','desc')
                                    ->get();
            $view->featured     =  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name')
                                    ->where('news.featured',1)
                                    ->take(5)
                                    ->orderBy('news.id','desc')
                                    ->get();
            $view->trending     =  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name')
                                    ->where('news.trending',1)
                                    ->take(5)
                                    ->orderBy('news.id','desc')
                                    ->get();
            $view->more         =  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name')
                                    ->inRandomOrder()
                                    ->take(10)
                                    ->orderBy('news.id','desc')
                                    ->get();
            $view->slider       =  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name')
                                    ->where('news.status',1)
                                    ->inRandomOrder()
                                    ->orderBy('news.id','desc')
                                    ->paginate(6);
            
        });
    }
}
