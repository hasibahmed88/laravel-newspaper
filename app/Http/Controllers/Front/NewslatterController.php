<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Front\Newslatter;
use Illuminate\Http\Request;

class NewslatterController extends Controller
{
    // Visitor newsletter
    public function subscribe(Request $request){
        $request->validate([
            'email' =>  ['required','max:50'],
        ]);
        
        $newsletter = new Newslatter();
        $newsletter->email  =   $request->email;
        $newsletter->save();
        return back()->with('message','Thank you for subscribe.Now you will receive new articles in your email!');
    }

    // Manage subscriber
    public function manageSubscriber(){
        return view('admin.newsletter.manage-subscriber',[
            'subscriber'    =>  Newslatter::all(),
        ]);
    }

    // Delete subscriber
    public function deleteSubscriber(Request $request){
        $subscriber = Newslatter::find($request->id);
        $subscriber->delete();
        return back()->with('message','Subscriber delete successfully!');
    }
}
