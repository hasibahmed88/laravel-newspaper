<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'subcategory_name',
        'subcategory_description',
        'status',
    ];

    // Add New subcategory 
    public static function newSubcategoryInfo($request)
    {
        $subcategory = new SubCategory();
        $subcategory->category_id               =   $request->category_id;
        $subcategory->subcategory_name          =   $request->subcategory_name;
        $subcategory->subcategory_description   =   $request->subcategory_description;
        $subcategory->status                    =   $request->status;
        $subcategory->save();
    }

    // Edit subcategory 
    public static function updateSubcategoryInfo($request)
    {
        $subcategory = SubCategory::findOrFail($request->id);
        $subcategory->category_id               =   $request->category_id;
        $subcategory->subcategory_name          =   $request->subcategory_name;
        $subcategory->subcategory_description   =   $request->subcategory_description;
        $subcategory->status                    =   $request->status;
        $subcategory->save();
    }

}
