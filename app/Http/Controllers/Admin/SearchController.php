<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $search = $request->search;
        $posts = Post::like($search)->orderBy('created_at', 'desc')->with('category')->paginate(3); // scopeLike
        return view('admin.posts.search', compact('posts', 'search'));
    }
}
