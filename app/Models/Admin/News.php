<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'news_title',
        'news_short_description',
        'news_long_description',
        'status',
        'news_image',
        'total_view',
        'total_comment',
        'special',
        'featured',
        'trending',
        'tags'
    ];

    // crate new news 
    public static function newNewsInfo($request)
    {
        $news = New News();
        $image = $request->file('news_image');

        if($image){
            $image_name = hexdec(uniqid()).$image->getClientOriginalName();
            $image_path = 'admin/news-image/';
            $image->move($image_path,$image_name);
        }

        $news->category_id              =   $request->category_id;
        $news->subcategory_id           =   $request->subcategory_id;
        $news->news_title               =   $request->news_title;
        $news->news_short_description   =   $request->news_short_description;
        $news->news_long_description    =   $request->news_long_description;
        $news->status                   =   $request->status;
        $news->special                  =   $request->special;
        $news->featured                 =   $request->featured;
        $news->trending                 =   $request->trending;
        $news->tags                     =   $request->tags;
        if(isset($image_name)){
            $news->news_image           =   $image_name;
        }
        $news->save();
    }

    // Update news info
    public static function updateNewsInfo($request)
    {
        $news   = News::findOrFail($request->id);
        $image  = $request->file('news_image');

        if($image){
            $image_name = hexdec(uniqid()).$image->getClientOriginalName();
            $image_path = 'admin/news-image/';
            if($request->old_image_name != 'default.jpg'){
                unlink($image_path.$request->old_image_name);
            }
            $image->move($image_path,$image_name);
        }
        $news->category_id              =   $request->category_id;
        $news->subcategory_id           =   $request->subcategory_id;
        $news->news_title               =   $request->news_title;
        $news->news_short_description   =   $request->news_short_description;
        $news->news_long_description    =   $request->news_long_description;
        $news->status                   =   $request->status;
        $news->featured                 =   $request->featured;
        $news->trending                 =   $request->trending;
        $news->tags                     =   $request->tags;
        if(isset($image_name)){
            $news->news_image           =   $image_name;
        };
        $news->save();
    }

    // Publish news info
    public static function publishNewsInfo($id)
    {
        $news = News::findOrFail($id);
        $news->status = 1;
        $news->save();
    }

    // Unpublish news info
    public static function unpublishNewsInfo($id)
    {
        $news = News::findOrFail($id);
        $news->status = 0;
        $news->save();
    }

}
