<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private function messageValidate($request){
        return $request->validate([
            'name'      =>  ['required','max:50','min:3'],
            'email'     =>  ['required','max:50'],
            'subject'   =>  ['required','max:100','min:5'],
            'message'   =>  ['required','max:8000','min:5'],
        ]);
    }
    // Visitor message
    public function message(Request $request){
        Contact::newMessageInfo($request);
        return back()->with('message','Thank you for contact us. We\'ll response as soon as possible!' );
    }

    // Manage visitor message
    public function visitorMessage(){
        return view('admin.message.manage-message',[
            'message'   =>  Contact::all()
        ]);
    }

    // View message
    public function viewMessage($id){
        $message            =   Contact::findOrFail($id);
        $message->status    =   1;
        $message->save();
        return view('admin.message.view-message',[
            'message'   =>  Contact::findOrFail($id)
        ]);
    }
}
