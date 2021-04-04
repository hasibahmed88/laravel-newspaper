<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Contact;
use App\Models\Admin\News;
use App\Models\Front\Comment;
use App\Models\Front\Newslatter;
use Illuminate\Http\Request;

class ProjectController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $post = News::all();
        $newslatter = Newslatter::all();
        $message = Contact::where('status','0')->get();
        $comments = Comment::where('status',0)->get();
        
        return view('admin.home.home',compact('post','newslatter','message','comments'));
    }
}
