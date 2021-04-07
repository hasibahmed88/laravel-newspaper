<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Front\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    // Reply comment
    public function replyComment(Request $request){
        $request->validate([
            'reply_comment' =>  ['required','max:1000','min:1']
        ]);
        $reply = new Reply();
        $reply->news_id         =   $request->news_id;
        $reply->visitor_id      =   $request->visitor_id;
        $reply->comment_id      =   $request->comment_id;
        $reply->reply_comment   =   $request->reply_comment;
        $reply->save();

        return back();
    }
}
    