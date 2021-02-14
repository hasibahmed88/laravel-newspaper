<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_name',
        'category_description',
        'status',
    ];

    // New Category 
    public static function newCategoryInfo($request){
        $category = new Category();
        $category->category_name            =   $request->category_name;
        $category->category_description     =   $request->category_description;
        $category->status                   =   $request->status;
        $category->save();
    }

    // Update Category 
    public static function updateCategoryInfo($request){
        $category = Category::find($request->id);
        $category->category_name            =   $request->category_name;
        $category->category_description     =   $request->category_description;
        $category->status                   =   $request->status;
        $category->save();
    }

    // Publish & unpublish category
    public static function publishCategoryInfo($id){
        $category = Category::find($id);
        $category->status = 1;
        $category->save();
    }
    public static function unPublishCategoryInfo($id){
        $category = Category::find($id);
        $category->status = 0;
        $category->save();
    }
}
