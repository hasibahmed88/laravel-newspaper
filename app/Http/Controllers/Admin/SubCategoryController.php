<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
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

    public function addSubcategory(){
        return view('admin.sub-category.add-subcategory',[
            'categories'    =>  Category::where('status',1)->get(),
        ]);
    }

    // === Manage  Subcategory === ||
    public function manageSubcategory()
    {
        return view('admin.sub-category.manage-subcategory',[
            
            'subcategories' =>  DB::table('sub_categories')
                                    ->join('categories','sub_categories.category_id','categories.id')
                                    ->select('sub_categories.*','categories.category_name')
                                    ->where('sub_categories.deleted_at',null)
                                    ->get()
        ]);
    }

    // validate subcategory
    private function validateSubcategory($request)
    {
        return $request->validate([
            'category_id'               =>  ['required'],
            'subcategory_name'          =>  ['required','max:30','min:3','string'],
            'subcategory_description'   =>  ['required','max:150','min:5'],
            'status'                    =>  ['required'],
        ]);
    }

    // === Add New Subategory === ||
    public function newSubcategory(Request $request)
    {
        $this->validateSubcategory($request);
        SubCategory::newSubcategoryInfo($request);
        return back()->with('added_subcategory','Subcategory added successfully!');
    }

    // === Edit Subategory === ||
    public function editSubcategory($id)
    {
        return view('admin.sub-category.edit-subcategory',[
            'categories'    =>  Category::where('status',1)->get(),
            'subcategory'   =>  SubCategory::findOrFail($id),
        ]);
    }
    
    // === Update Subategory === ||
    public function updateSubcategory(Request $request)
    {
        $this->validateSubcategory($request);
        SubCategory::updateSubcategoryInfo($request);
        return redirect('category/manage-subcategory')->with('message','Subcategory update successfull!');
    }

    // === Unpublish Subategory === ||
    public function unpublishSubcategory($id){
        $subcategory            =   SubCategory::findOrFail($id);
        $subcategory->status    =   0;
        $subcategory->save();
        return back()->with('message','Subcategory unpublish successfull!');
    }

    // === Publish Subategory === ||
    public function publishSubcategory($id){
        $subcategory            =   SubCategory::findOrFail($id);
        $subcategory->status    =   1;
        $subcategory->save();
        return back()->with('message','Subcategory publish successfull!');
    }

    // === Soft delete Subategory === ||
    public function deleteSubcategory(Request $request){
        $subCategory = SubCategory::find($request->id);
        if($subCategory->status == 1){
            return back()->with('unpublish_subcategory','Subcategory unpublished first! '); 
        }
        else{
            $subCategory->delete();
            return back()->with('message','Subcategory moved to trashed!');
        }
        
    }

    // === Trashed Subategory === ||
    public function trashSubcategory(){
        return view('admin.sub-category.trashed',[
            'subcategories' =>  DB::table('sub_categories')
                                    ->join('categories','sub_categories.category_id','categories.id')
                                    ->select('sub_categories.*','categories.category_name')
                                    ->where('sub_categories.deleted_at','!=' ,null)
                                    ->get(),
        ]);
    }

    // === Restore Subategory === ||
    public function restoreSubcategory($id){
        SubCategory::onlyTrashed()->findOrFail($id)->restore();
        return back()->with('message','Subcategory resotre successfull!');
    }

    // === Permanent delete Subategory === ||
    public function permanentDeleteSubcategory(Request $request){
        SubCategory::onlyTrashed()->findOrFail($request->id)->forceDelete();
        return back()->with('message','Subcategory delete successfull!');
    }

}
