<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(Request $req) {
        DB::table('comments')->insert([
            'sender' => $req->sender,
            'body' => $req->body,
            'post_id' => $req->id
        ]);
        return redirect()->back();
    }

    public function delete(Request $req) {
        if($req->session()->has('user')) 
            DB::table('comments')->where('id', $req->id)->delete();
        return redirect()->back();
    }
}
