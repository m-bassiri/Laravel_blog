<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(Request $request) {
        if($request->session()->has('user'))
            return redirect()->back();
        else return view('login');
    }

    public function store(Request $req) {
        $result = DB::table('users')->where('username',$req->username)
            ->where('passhash',hash('sha256',$req->password))->get()->count();
        if($result){
            session(['user' => $req->username]);
            return redirect(route('blog'));
        }
        else
            return redirect()->back()->withErrors(['Incorrect credentials!']);
    }
    public function logout(Request $req) {
        $req->session()->forget('user');
        return redirect(route('blog'));
    }    
}