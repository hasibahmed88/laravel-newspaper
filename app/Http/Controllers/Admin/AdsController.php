<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
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

    private function validateAds($request){
        return $request->validate([
            'category_name'     =>  ['required'],
            'ads_title'         =>  ['required','min:5','max:80','string'],
            'ads_description'   =>  ['required','min:5','max:200','string'],
            'link'              =>  ['required'],
            'expire_date'       =>  ['required'],
            'status'            =>  ['required'],
        ]);
    }

    // === Add ads === ||
    public function addAds ()
    {
        $token = hexdec(uniqid());
        return view('admin.ads.add-ads');
    }
    

    // === Manage ads === ||
    public function manageAds ()
    {
        return view('admin.ads.manage-ads',[
            'ads'   =>  Ads::all()
        ]);
    }

    // === Trashed ads === ||
    public function trashedAds ()
    {
        return view('admin.ads.trashed-ads',[
            'trashed'   =>  Ads::onlyTrashed()->get()
        ]);
    }

    // === Trashed ads === ||
    public function newAds (Request $request)
    {
        $this->validateAds($request);
        Ads::newAdsInfo($request);
        return back()->with('message','New ads added successfull!');
    }

    // === Edit ads === ||
    public function editAds($id)
    {
        return view('admin.ads.edit-ads',[
            'ads'    =>  Ads::findOrFail($id)
        ]);
    }

    // === Update ads === ||
    public function updateAds(Request $request)
    {
        $this->validateAds($request);
        Ads::updateAdsInfo($request);
        return redirect('ads/manage-ads')->with('message','Ads update successfull!');
    }

    // === View ads === ||
    public function viewAds($id){
        return view('admin.ads.view-ads',[
            'ads'    =>  Ads::findOrFail($id)
        ]);
    }

    // === Publish & unpublish ads === ||

    public function publishAds($id)
    {
        $ads = Ads::find($id);
        $ads->status = 1;
        $ads->save();
        return back()->with('message','Ads publish successfull!');
    }

    public function unpublishAds($id){
        $ads = Ads::find($id);
        $ads->status = 0;
        $ads->save();
        return back()->with('message','Ads unpublish successfull!');
    }


    // === Delete ads === ||
    public function deleteAds(Request $request)
    {
        $ads = Ads::withTrashed()->find($request->id);
        if($ads->status == 1){
            return back()->with('warning','Cannot delete ads.The ads already published!');
        }else{
            $ads->delete();
            return back()->with('message','Ads moved to trashed!');
        }
        
    }

    // === Restore ads === ||
    public function restoreAds($id)
    {
        Ads::onlyTrashed()->findOrFail($id)->restore();
        return back()->with('message','Ads restore successfull!');
    }

    // === Permanent delete ads === ||
    public function permanentDeleteAds(Request $request)
    {
        $ads= Ads::onlyTrashed()->findOrFail($request->id);
        unlink('admin/ads-image/'.$ads->ads_photo);
        $ads->forceDelete();
        return back()->with('delete','Ads permanent delete successfull!');
    }

    // === Trashed ads === ||
    // === Trashed ads === ||



}
