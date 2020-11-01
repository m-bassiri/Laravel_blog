<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index($id) {
        $post = DB::table('posts')->where('id', $id)->get();
        $comments = DB::table('comments')->where('post_id', $id)->get();
        return view('post', compact('post', 'comments'));
    }

    public function add(Request $req) {
        if($req->session()->has('user'))
            return view('new');
        else return redirect()->back();
    }

    public function store(Request $req) {
        DB::table('posts')->insert([
            'title' => $req->title,
            'body' => $req->body
        ]);
        return redirect('/');
    }

    public function delete(Request $req) {
        if($req->session()->has('user')) {
            DB::table('posts')->where('id', $req->id)->delete();
        }
        return redirect()->back();
    }

    public function edit_index(Request $req, $id) {
        if($req->session()->has('user')) {
            $p = DB::table('posts')->where('id', $id)->get();
            return view('edit', compact('p'));
        }
        else return redirect()->back();
    }

    public function edit(Request $req) {
        if($req->session()->has('user')) {
            DB::table('posts')->where('id', $req->id)->update(['title'=>$req->title, 'body'=>$req->body]);
            return redirect('/posts/'.$req->id);
        }
        else return redirect()->back();
    }
}
