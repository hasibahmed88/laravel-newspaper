<?php

namespace App\Providers;

use App\Models\Admin\Category;
use App\Models\Admin\Website;
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
            $view->website_info =   Website::where('id',1)->first();
            $view->categories   =  Category::where('status',1)->get();
            
            $view->recent       =  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name_en','categories.category_name_bn')
                                    ->where('news.status',1)
                                    ->take(5)
                                    ->orderBy('news.id','desc')
                                    ->get();
            $view->featured     =  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name_en','categories.category_name_bn')
                                    ->where('news.featured',1)
                                    ->take(5)
                                    ->orderBy('news.id','desc')
                                    ->get();
            $view->trending     =  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name_en','categories.category_name_bn')
                                    ->where('news.trending',1)
                                    ->take(5)
                                    ->orderBy('news.id','desc')
                                    ->get();
            $view->more         =  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name_en','categories.category_name_bn')
                                    ->inRandomOrder()
                                    ->take(10)
                                    ->orderBy('news.id','desc')
                                    ->get();
            
        });
    }
}
