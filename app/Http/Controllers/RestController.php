<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestController extends Controller
{
    public function posts() {
        $posts = DB::table('posts')->get();
        return response()->json($posts);
    }

    public function comments() {
        $coms = DB::table('comments')->get();
        return response()->json($coms);
    }
}
