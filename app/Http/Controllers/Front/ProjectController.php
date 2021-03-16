<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\Category;
use App\Models\Admin\ContactInfo;
use App\Models\Admin\News;
use App\Models\Admin\SubCategory;
use App\Models\Front\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    
    // Index
    public function index(){
        // $category_game   =    Category::where('status',1)->where('category_name','খেলাধুলা');
        return view('front.home.home',[
            'categories'    => Category::where('status',1)->get(),
            'special'       =>  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name_en','categories.category_name_bn')
                                    ->where('news.status',1)
                                    ->where('news.special',1)
                                    ->orderBy('news.id','desc')
                                    ->paginate(6),
            'most_view'     =>  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name_en','categories.category_name_bn')
                                    ->where('news.status',1)
                                    ->orderBy('news.total_view','desc')
                                    ->take(6)
                                    ->get(),
            'total_comment' =>  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name_en','categories.category_name_bn')
                                    ->where('news.status',1)
                                    ->orderBy('news.total_comment','desc')
                                    ->take(6)
                                    ->get(),
            'heading_news'  =>  News::where('status',1)->skip(5)->take(10)->get(),
            'slider'        =>  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name_en','categories.category_name_bn')
                                    ->where('news.status',1)
                                    ->inRandomOrder()
                                    ->orderBy('news.id','desc')
                                    ->paginate(6),
            'bangladesh'        =>  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name_en','categories.category_name_bn')
                                    ->where('news.status',1)
                                    ->where('categories.category_name_en','bangladesh')
                                    ->orderBy('categories.id','desc')
                                    ->take(10)
                                    ->get(),
            'sports'        =>  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name_en','categories.category_name_bn')
                                    ->where('news.status',1)
                                    ->where('categories.category_name_en','sports')
                                    ->orderBy('categories.id','desc')
                                    ->take(6)
                                    ->get(),
            'international' =>  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name_en','categories.category_name_bn')
                                    ->where('news.status',1)
                                    ->where('categories.category_name_en','international')
                                    ->orderBy('categories.id','desc')
                                    ->take(6)
                                    ->get(),
            'entertainment' =>  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name_en','categories.category_name_bn')
                                    ->where('news.status',1)
                                    ->where('categories.category_name_en','entertainment')
                                    ->orderBy('categories.id','desc')
                                    ->take(6)
                                    ->get(),
            'business'      =>  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name_en','categories.category_name_bn')
                                    ->where('news.status',1)
                                    ->where('categories.category_name_en','business')
                                    ->orderBy('categories.id','desc')
                                    ->take(6)
                                    ->get(),
            'religion'      =>  DB::table('news')
                                    ->join('categories','news.category_id','categories.id')
                                    ->select('news.*','categories.category_name_en','categories.category_name_bn')
                                    ->where('news.status',1)
                                    ->where('categories.category_name_en','religion')
                                    ->orderBy('categories.id','desc')
                                    ->take(6)
                                    ->get(),
        ]);
    }

    // About
    public function about(){
        return view('front.about.about',[
            'about' =>  About::where('id',1)->first(),
        ]);
    }
    // Contact
    public function contact(){
        return view('front.contact.contact',[
            'contact' =>  ContactInfo::where('id',1)->first(),
        ]);
    }

    // Latest News
    public function latestNews(){
        return view('front.news.latest-news',[
            'news'  =>  DB::table('news')
                            ->join('categories','news.category_id','categories.id')
                            ->select('news.*','categories.category_name_en','categories.category_name_bn')
                            ->where('news.status',1)
                            ->orderBy('news.id','desc')
                            ->paginate(10)
        ]);
    }
    
    // Category news
    public function categoryNews($name){
        $category = Category::where('category_name_en',$name)->first();
        return view('front.news.category-news',[
            'news'          =>  DB::table('news')
                                ->join('categories','news.category_id','categories.id',)
                                ->select('news.*','categories.category_name_en','categories.category_name_bn')
                                ->where('news.status',1)
                                ->where('news.category_id',$category->id)
                                ->paginate(10),
            'category_name' =>  $category->category_name_bn,
            
            'subCategory'   =>  DB::table('sub_categories')
                                ->join('categories','sub_categories.category_id','categories.id')
                                ->select('sub_categories.*','categories.category_name_en','categories.category_name_bn')
                                ->where('sub_categories.status',1)
                                ->where('sub_categories.category_id',$category->id)
                                ->paginate(10),
        ]);
    }

    // Subcategory news
    public function subcategoryNews($category_name, $subcategory_name){
        $category       =   Category::where('category_name_en',$category_name)->first();
        $subcategory    =   SubCategory::where('subcategory_name',$subcategory_name)->first();
        return view('front.news.category-news',[
            'news'          =>  DB::table('news')
                                ->join('categories','news.category_id','categories.id')
                                ->select('news.*','categories.category_name_en','categories.category_name_bn')
                                ->where('news.status',1)
                                ->where('news.category_id',$category->id)
                                ->where('news.subcategory_id',$subcategory->id)
                                ->paginate(5),
            'subCategory'   =>  DB::table('sub_categories')
                                ->join('categories','sub_categories.category_id','categories.id')
                                ->select('sub_categories.*','categories.category_name_en','categories.category_name_bn')
                                ->where('sub_categories.status',1)
                                ->where('sub_categories.category_id',$category->id)
                                ->paginate(10),
            'category_name'     =>      $category->category_name_bn,
            'subcategory_name'  =>      $subcategory_name,
        ]);
    }

    // News details
    public function newsDetails($id,$name){
        $hit_count = News::find($id);
        $hit_count->total_view += 1;
        $hit_count->save();

        $news = News::where('news.id',$id)->first();

        return view('front.news.news-details',[
            'news'      =>  DB::table('news')
                            ->join('categories','news.category_id','categories.id')
                            ->select('news.*','categories.category_name_en','categories.category_name_bn')
                            ->where('news.id',$id)
                            ->first(),
            'comments'  =>  DB::table('comments')
                            ->join('visitors','comments.visitor_id','visitors.id')
                            ->join('news','comments.news_id','news.id')
                            ->select('comments.*','visitors.visitor_name')
                            ->where('news.id',$id)
                            ->where('comments.status',1)
                            ->orderBy('comments.id','desc')
                            ->paginate(10),
            'related'   =>  DB::table('news')
                            ->join('categories','news.category_id','categories.id')
                            ->select('news.*','categories.category_name_en','categories.category_name_bn')
                            ->where('news.id','!=',$id)
                            ->where('categories.id',$news->category_id)
                            ->take(6)
                            ->get(),
        ]);
    }

}
