<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    // Website setting
    public function websiteSetting(){
        return view('admin.setting.website-setting',[
            'web_details'   =>  Website::where('id',1)->first(),
        ]);
    }

    // Update website
    public function updateWebsite(Request $request){
        $web = Website::where('id',1)->first();
        $header_image   =   $request->file('web_header_logo');
        $footer_image   =   $request->file('web_footer_logo');
        $image_path     =   'admin/logo-image/';

        if ($header_image) {
            $header_image_name =   hexdec(uniqid()).$header_image->getClientOriginalName();
            unlink($image_path.$web->web_header_logo);
            $header_image->move($image_path,$header_image_name);
            
        }
        if ($footer_image) {
            $footer_image_name =   hexdec(uniqid()).$footer_image->getClientOriginalName();
            unlink($image_path.$web->web_footer_logo);
            $footer_image->move($image_path,$footer_image_name);
        }

        if (isset($header_image_name)) {
            $web->web_header_logo   =   $header_image_name;
        }
        if (isset($footer_image_name)) {
            $web->web_footer_logo   =   $footer_image_name;
        }
        $web->web_title             =   $request->web_title;
        $web->web_description       =   $request->web_description;
        $web->web_footer_text       =   $request->web_footer_text;
        $web->save();

        return back()->with('message','Website info update successfully!');
    }

}
