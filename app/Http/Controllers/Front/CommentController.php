<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\News;
use App\Models\Front\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    // News comment
    public function newsComment(Request $request){
        $request->validate([
            'comment'   =>  ['required','max:1000'],
        ]);
        
        $comment = new Comment();
        $comment->news_id       =   $request->news_id;
        $comment->visitor_id    =   $request->visitor_id;
        $comment->comment       =   $request->comment;
        $comment->save();

        $news   =   News::find($request->news_id);
        $news->total_comment += 1;
        $news->save();
        return back()->with('message','Thank you for your comment.Comment review on admin & comment publish as soon as possible!');
    }


    // Manage Comment =================  Admin   ====================
    public function manageComment(){
        return view('admin.comment.manage-comment',[
            'comments'  =>  DB::table('comments')
                            ->join('visitors','comments.visitor_id','visitors.id')
                            ->join('news','comments.news_id','news.id')
                            ->select('comments.*','visitors.visitor_name','news.news_title')
                            ->get()
        ]);
    }
    
    // View comment
    public function viewComment($id){
        return view('admin.comment.view-comment',[
            'comment'   =>  Comment::find($id),
        ]);
    }

    // Publish $ unpublish comment
    public function unpublishComment($id){
        $comment    =   Comment::find($id);
        $comment->status = 0;
        $comment->save();
        return back()->with('message','Comment unpublish successfully!');
    }

    public function publishComment($id){
        $comment    =   Comment::find($id);
        $comment->status = 1;
        $comment->save();
        return back()->with('message','Comment publish successfully!');
    }

    // Delete comment
    public function deleteComment(Request $request){
        $comment    =   Comment::find($request->id);
        $comment->delete();
        return back()->with('delete_message','Comment delete successfully!');
    }

}
