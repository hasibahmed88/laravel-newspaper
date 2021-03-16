<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    // Search News
    public function searchNews(Request $request){
        return view('front.search.search-news',[
            'news'  =>  DB::table('news')
                            ->join('categories','news.category_id','categories.id')
                            ->select('news.*','categories.category_name_en','categories.category_name_bn')
                            ->where('news.status',1)
                            ->where('news.news_title','LIKE',"%{$request->search_key}%")
                            ->orderBy('news.id','desc')
                            ->paginate(10)
        ]);
    }
}
