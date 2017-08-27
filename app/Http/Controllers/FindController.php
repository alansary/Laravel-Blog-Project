<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FindController extends Controller
{
    public function title($id) {
        return view('finds.title')->with('posts', Post::where('title', Post::find($id)->title));
    }

    public function body($id) {
        return view('finds.body')->with('posts', Post::where('body', Post::find($id)->body));
    }

    public function created_at($id) {
        return view('finds.created_at')->with('posts', Post::where('created_at', Post::find($id)->created_at));
    }

    public function user($id) {
        return view('finds.user')->with('posts', Post::where('user_id', Post::find($id)->user_id));
    }
}
