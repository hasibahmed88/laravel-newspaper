<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\ContactInfo;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // About
    public function about(){
        return view('admin.setting.about',[
            'about' =>  About::where('id',1)->first()
        ]);
    }
    // update about
    public function updateAbout(Request $request){
        $about = About::where('id',1)->first();
        $about->about_heading               =   $request->about_heading;
        $about->about_short_description     =   $request->about_short_description;
        $about->about_long_description      =   $request->about_long_description;
        $about->save();
        return back()->with('message','About updated successfully!');
    }

    // Contact
    public function contact(){
        return view('admin.setting.contact',[
            'contact'   =>  ContactInfo::where('id',1)->first(),
        ]);
    }
    // update contact
     public function updateContact(Request $request){
         $contact = ContactInfo::where('id',1)->first();
         $contact->contact_heading      =   $request->contact_heading;
         $contact->contact_description  =   $request->contact_description;
         $contact->save();
         return back()->with('message','Contact info updated successfull!');
     }
}
