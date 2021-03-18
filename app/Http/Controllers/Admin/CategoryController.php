<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function addCategory(){
        return view('admin.category.add-category');
    }

    // === Manage Category === ||
    public function manageCategory()
    {
        return view('admin.category.manage-category',[
            'categories'    =>  Category::all(),
        ]);
    }

    // === Validate Category === ||
    private function validateCategory($request)
    {
        return $request->validate([
            'category_name_en'          =>  ['required','max:30','min:3','string'],
            'category_name_bn'          =>  ['required','max:30','min:3','string'],
            'category_description'      =>  ['required','max:150','min:5'],
            'status'                    =>  ['required'],
        ]);
    }

    // === New Category === ||
    public function newCategory(Request $request)
    {
        $category_name = $request->category_name;
        $category = Category::where('category_name',$category_name)->first();
        if ($category) {
            return back()->with('warning','Category name already exist!');
        }
        else{
            $this->validateCategory($request);
            Category::newCategoryInfo($request);
            return back()->with('message','New category added successfull!');
        }
    }

    // === New Category === ||
    public function editCategory($id)
    {
        return view('admin.category.edit-category',[
            'category'  =>  Category::find($id)
        ]);
    }

    // === Update Category === ||
    public function updateCategory(Request $request)
    {
        $this->validateCategory($request);
        Category::updateCategoryInfo($request);
        return redirect('category/manage-category')->with('update_category','Category update successfull!');
    }

    // === Publish & unpublish Category === ||
    public function publishCategory($id)
    {
        Category::publishCategoryInfo($id);
        return back()->with('status1','Category Published');
    }
    public function unPublishCategory($id)
    {
        Category::unPublishCategoryInfo($id);
        return back()->with('status0','Category Unpublished');
    }

    // === Soft delete category === ||
    public function deleteCategory(Request $request)
    {
        $category       = Category::find($request->id);
        $subCategory    = SubCategory::where('category_id',$category->id)->first();
        if($category->status == 1){
            return back()->with('unpublish_category','Category unpublished first! '); 
        }
        else if($subCategory){
            return back()->with('unpublish_category','Cannot move to trashed. Subcategory exists in this category! ');
        }
        else{
            $category->delete();
            return back()->with('delete_category','Category moved on trashed!');
        }
    }

    // === View Trashed category === ||
    public function trashCategory()
    {
        return view('admin.category.trashed-category',[
            'categories'    =>  Category::onlyTrashed()->get(),
        ]);
    }

    // === Restore category === ||
    public function restoreCategory($id)
    {
        Category::onlyTrashed()->find($id)->restore();
        return back()->with('message','Category restore successfully!');
    }

    // === Permanent delete category === ||
    public function permanentDeleteCategory(Request $request)
    {
        Category::onlyTrashed()->findOrFail($request->id)->forceDelete();
        return back()->with('delete','Category delete successfully!');
    }


}
