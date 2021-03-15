<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'status',
    ];

    // New message info
    public static function newMessageInfo($request){
        $message            =   new Contact();
        $message->name      =   $request->name;
        $message->email     =   $request->email;
        $message->subject   =   $request->subject;
        $message->message   =   $request->message;
        $message->save();
    }
}
