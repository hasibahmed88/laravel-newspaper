<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
            'category_name'         =>  ['required','max:30','min:3','string'],
            'category_description'  =>  ['required','max:150','min:5'],
            'status'                =>  ['required'],
        ]);
    }

    // === New Category === ||
    public function newCategory(Request $request)
    {
        $this->validateCategory($request);
        Category::newCategoryInfo($request);
        return back()->with('message','New category added successfull!');
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
        Category::find($request->id)->delete();
        return back()->with('delete_category','Category moved on trashed!');
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