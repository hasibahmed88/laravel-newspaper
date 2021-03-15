<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\News;
use App\Models\Admin\SubCategory;
use App\Models\Front\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    
    // Index
    public function index(){
        return view('front.home.home',[
            'categories'    =>  Category::where('status',1)->get(),
            'special'       =>  DB::table('news')
                                ->join('categories','news.category_id','categories.id')
                                ->select('news.*','categories.category_name')
                                ->where('news.status',1)
                                ->where('news.special',1)
                                ->orderBy('news.id','desc')
                                ->paginate(6),
            'most_view'     =>  DB::table('news')
                                ->join('categories','news.category_id','categories.id')
                                ->select('news.*','categories.category_name')
                                ->where('news.status',1)
                                ->orderBy('news.total_view','desc')
                                ->paginate(5),
            'total_comment' =>  DB::table('news')
                                ->join('categories','news.category_id','categories.id')
                                ->select('news.*','categories.category_name')
                                ->where('news.status',1)
                                ->orderBy('news.total_comment','desc')
                                ->paginate(8),
        ]);
    }

    // About
    public function about(){
        return view('front.about.about');
    }
    // Contact
    public function contact(){
        return view('front.contact.contact');
    }

    // Latest News
    public function latestNews(){
        return view('front.news.latest-news',[
            'news'  =>  DB::table('news')
                            ->join('categories','news.category_id','categories.id')
                            ->select('news.*','categories.category_name')
                            ->where('news.status',1)
                            ->orderBy('news.id','desc')
                            ->paginate(10)
        ]);
    }
    
    // Category news
    public function categoryNews($name){
        $category = Category::where('category_name',$name)->first();
        return view('front.news.category-news',[
            'news'          =>  DB::table('news')
                                ->join('categories','news.category_id','categories.id')
                                ->select('news.*','categories.category_name')
                                ->where('news.status',1)
                                ->where('news.category_id',$category->id)
                                ->paginate(5),
            'category_name' =>  $name,
            // 'subCategory'   =>  SubCategory::where('category_id',$category->id)->get(),
            'subCategory'   =>  DB::table('sub_categories')
                                ->join('categories','sub_categories.category_id','categories.id')
                                ->select('sub_categories.*','categories.category_name')
                                ->where('sub_categories.status',1)
                                ->where('sub_categories.category_id',$category->id)
                                ->get(),
        ]);
    }

    // Subcategory news
    public function subcategoryNews($category_name, $subcategory_name){
        $category       =   Category::where('category_name',$category_name)->first();
        $subcategory    =   SubCategory::where('subcategory_name',$subcategory_name)->first();
        return view('front.news.category-news',[
            'news'          =>  DB::table('news')
                                ->join('categories','news.category_id','categories.id')
                                ->select('news.*','categories.category_name')
                                ->where('news.status',1)
                                ->where('news.category_id',$category->id)
                                ->where('news.subcategory_id',$subcategory->id)
                                ->paginate(5),
            'subCategory'   =>  DB::table('sub_categories')
                                ->join('categories','sub_categories.category_id','categories.id')
                                ->select('sub_categories.*','categories.category_name')
                                ->where('sub_categories.status',1)
                                ->where('sub_categories.category_id',$category->id)
                                ->get(),
            'category_name'     =>      $category_name,
            'subcategory_name'  =>      $subcategory_name,
        ]);
    }

    // News details
    public function newsDetails($id,$name){
        $hit_count = News::find($id);
        $hit_count->total_view += 1;
        $hit_count->save();
        return view('front.news.news-details',[
            'news'      =>  DB::table('news')
                            ->join('categories','news.category_id','categories.id')
                            ->select('news.*','categories.category_name')
                            ->where('news.id',$id)
                            ->first(),
            'comments'  =>  DB::table('comments')
                            ->join('visitors','comments.visitor_id','visitors.id')
                            ->join('news','comments.news_id','news.id')
                            ->select('comments.*','visitors.visitor_name')
                            ->where('news.id',$id)
                            ->where('comments.status',1)
                            ->orderBy('comments.id','desc')
                            ->get(),
        ]);
    }

}
