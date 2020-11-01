<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index() {
        $posts = DB::table('posts')->get();
        return view('blog', compact('posts'));
    }
    public function store(Request $req) {
        $posts = DB::table('posts')->where('body','LIKE', '%'.$req->text.'%')
            ->orWhere('title','LIKE', '%'.$req->text.'%')->get();
        return view('blog', compact('posts'));
    }
}
