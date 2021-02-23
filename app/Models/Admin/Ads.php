<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ads extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_name',
        'ads_title',
        'ads_description',
        'ads_photo',
        'link',
        'expire_date',
        'status',
        'token',
    ];

    // Add new ads
    public static function newAdsInfo($request){
        $token  = hexdec(uniqid());
        $ads    = new Ads();
        $image  = $request->file('ads_photo');
        $image_name = hexdec(uniqid()).$image->getClientOriginalName();
        $image_path = 'admin/ads-image/';
        $image->move($image_path,$image_name);
        
        $ads->category_name     =   $request->category_name;
        $ads->ads_title         =   $request->ads_title;
        $ads->ads_description   =   $request->ads_description;
        $ads->ads_photo         =   $image_name;
        $ads->link              =   $request->link;
        $ads->expire_date       =   $request->expire_date;
        $ads->status            =   $request->status;
        $ads->token             =   $token;
        $ads->save();
    }
    
    // Update ads info
    public static function updateAdsInfo($request){
        $ads = Ads::withTrashed()->findOrFail($request->id);
        $image = $request->file('ads_photo');
        if ($image) {
            $image_name = hexdec(uniqid()).$image->getClientOriginalName();
            $image_path = 'admin/ads-image/';
            unlink($image_path.$ads->ads_photo);
            $image->move($image_path,$image_name);
        }

        $ads->category_name     =   $request->category_name;
        $ads->ads_title         =   $request->ads_title;
        $ads->ads_description   =   $request->ads_description;
        $ads->link              =   $request->link;
        $ads->expire_date       =   $request->expire_date;
        $ads->status            =   $request->status;
        if(isset($image_name)){
            $ads->ads_photo     =   $image_name;
        }
        $ads->save();
    }

}
