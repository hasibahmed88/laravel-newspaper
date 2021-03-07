<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\News;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function validateNews($request)
    {
        return $request->validate([
            'category_id'               =>  ['required'],
            'subcategory_id'            =>  ['required'],
            'news_title'                =>  ['required','min:5','max:100'],
            'news_short_description'    =>  ['required','min:5','max:1000'],
            'news_long_description'     =>  ['required','min:5','max:50000'],
            'status'                    =>  ['required'],
        ]);
    }

    // === Add News === ||
    public function addNews()
    {
        return view('admin.news.add-news',[
            'categories'    =>   Category::where('status',1)->get(),
            'subcategories' =>  SubCategory::where('status',1)->get(),
        ]);
    }

    // === Manage News === ||
    public function manageNews()
    {
        return view('admin.news.manage-news',[
            'news'  =>  DB::table('news')
                        ->join('categories','news.category_id','categories.id')
                        ->join('sub_categories','news.subcategory_id','sub_categories.id')
                        ->select('news.*','categories.category_name','sub_categories.subcategory_name')
                        ->where('news.deleted_at',null)
                        ->get()
        ]);
    }

    // === Manage News === ||
    public function trashedNews()
    {
        return view('admin.news.trashed-news',[
            'news'  =>  DB::table('news')
                        ->join('categories','news.category_id','categories.id')
                        ->join('sub_categories','news.subcategory_id','sub_categories.id')
                        ->select('news.*','categories.category_name','sub_categories.subcategory_name')
                        ->where('news.deleted_at','!=',null)
                        ->get()
        ]);
    }

    // === Add New News === ||

    public function newNews(Request $request)
    {
        $this->validateNews($request);
        News::newNewsInfo($request);
        return back()->with('message','News added successfull!');

    }

    // === View News === ||
    public function viewNews($id)
    {
        return view('admin.news.view-news',[
            'news'          =>  News::find($id),
            'categories'    =>   Category::where('status',1)->get(),
            'subcategories' =>  SubCategory::where('status',1)->get(),
        ]);
    }

    // === Edit News === ||
    public function editNews($id)
    {
        return view('admin.news.edit-news',[
            'categories'    =>   Category::where('status',1)->get(),
            'subcategories' =>  SubCategory::where('status',1)->get(),
            'news'          =>  News::findOrFail($id),
        ]);
    }

    // === Update News === ||
    public function updateNews(Request $request)
    {
        $this->validateNews($request);
        News::updateNewsInfo($request);
        return redirect('news/manage-news')->with('message','News update successfull!');
    }

    // === Publish & unpublish News === ||
    public function publishNews($id)
    {
        News::publishNewsInfo($id);
        return back()->with('message','News publish successfull!');
    }
    public function unpublishNews($id)
    {
        News::unpublishNewsInfo($id);
        return back()->with('message','News unpublish successfull!');
    }

    // === Soft delete News === ||

    public function deleteNews(Request $request)
    {
        $news = News::find($request->id);
        if($news->status == 1 ){
            return back()->with('status_message','Cannot trashed news.Do unpublished news first!');
        }
        News::find($request->id)->delete();
        return back()->with('message','News moved to trashed!');
    }

    // === Restore News === ||
    public function restoreNews($id)
    {
        News::onlyTrashed()->findOrFail($id)->restore();
        return back()->with('message','News restore successfull!');
    }

    // === Permanent delete News === ||
    public function permanentDeleteNews(Request $request)
    {
        $news = News::onlyTrashed()->findOrFail($request->id);
        $news->forceDelete();
        unlink('admin/news-image/'.$news->news_image);
        return back()->with('delete_message','News deleted successfull!');
    }

}
