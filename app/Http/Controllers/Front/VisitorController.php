<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Front\Visitor;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class VisitorController extends Controller
{

    // visitor Profile 
    public function visitorProfile($id){
        $visitor = Visitor::where('id',$id)->first();
        return view('front.visitor.visitor-profile',compact('visitor'));
    }

    // Visitor Register
    public function visitorRegister(){
        return view('front.visitor.visitor-register');
    }

    // Visitor login
    public function visitorLogin(){
        return view('front.visitor.visitor-login');
    }

    private function validateVisitor($request){
        return $request->validate([
            'visitor_name'  =>  ['required','max:50','min:3'],
            'email'         =>  ['required','max:50','min:1'],
            'visitor_name'  =>  ['required','max:50','min:8'],
        ]);
    }
    // New visitor
    public function newVisitor(Request $request){
        $ip   = $_SERVER['REMOTE_ADDR'];
        $visitor = new Visitor();
        $this->validateVisitor($request);
        $visitor->visitor_name  =   $request->visitor_name;
        $visitor->email         =   $request->email;
        $visitor->password      =   bcrypt($request->password);
        $visitor->ip            =   $ip;
        $visitor->status        =   1;
        $visitor->save();

        session()->put('visitor_name', $request->visitor_name);
        session()->put('visitor_email', $request->email);
        session()->put('visitor_id', $visitor->id);

        return redirect('/');
    }

    // New visitor login
    public function newVisitorLogin(Request $request){
        
        $visitor = Visitor::where('email', $request->email)->first();
        if($visitor){
            if (password_verify($request->password, $visitor->password)) {
                $visitor->status = 1;
                $visitor->save();

                session()->put('visitor_id', $visitor->id);
                session()->put('visitor_name', $visitor->visitor_name);
                session()->put('visitor_email', $visitor->email);

                if($request->has('rememberMe')){
                    Cookie::queue('ID', $visitor->id, 43200 * 6);
                    Cookie::queue('VISITOR_NAME', $visitor->visitor_name, 43200 * 6);
                    Cookie::queue('VISITOR_EMAIL', $visitor->email, 43200 * 6);
                }
                return redirect('/');

            } else {
                return back()->with('message','Invalid password!');
            }
        }
        else{
            return back()->with('message','Invalid email address!');
        }
    }

    // Visitor logout
    public function visitorLogout($ip){
        // Session 
        session()->forget('visitor_id');
        session()->forget('visitor_name');
        session()->forget('visitor_email');

        // Cookie 
        // Cookie::flush('visitor_name');
        Cookie::queue(Cookie::forget('ID'));
        Cookie::queue(Cookie::forget('VISITOR_NAME'));
        Cookie::queue(Cookie::forget('VISITOR_EMAIL'));

        $visitor = Visitor::where('ip', $ip)->first();
        $visitor->status = 0;
        $visitor->save();
        
        return redirect('/');
    }

    // Ajax register email check
    public function checkEmail($email){
        $visitor = Visitor::where('email',$email)->first();
        if($visitor){
            return json_encode('True');
        }
        else{
            return json_encode('False');
        }
    }
}
