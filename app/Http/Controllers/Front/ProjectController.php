<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\News;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    // Index
    public function index(){
        return view('front.home.home',[
            // 'categories'    =>  Category::where('status',1)->get()
        ]);
    }

    // Latest News
    public function latestNews(){
        return view('front.news.latest-news');
    }
    
    // Category news
    public function categoryNews($name){
        $category = Category::where('category_name',$name)->first();
        return view('front.news.category-news',[
            'news'          =>  News::where('category_id',$category->id)->paginate(5),
            'category_name' =>  $name,
        ]);
    }

}
