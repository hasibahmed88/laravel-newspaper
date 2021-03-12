<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Front\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{

    // Manage Visitor
    public function manageVisitor(){
        return view('admin.visitor.manage-visitor',[
            'visitors'  =>  Visitor::all()
        ]);
    }

    // Logout visitor 
    public function visitorLogout($ip){
        $visitor = Visitor::where('ip',$ip)->first();
        $visitor->status = 0;
        $visitor->save();
        return back()->with('message','Visitor loged out successfully!');
    }

    // Delete visitor
    public function deleteVisitor(Request $request){
        $visitor = Visitor::find($request->id);
        $visitor->delete();
        return back()->with('message','Visitor delete successfully!');
    }

}
