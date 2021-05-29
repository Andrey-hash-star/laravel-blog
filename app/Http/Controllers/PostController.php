<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;

class PostController extends Controller
{
    public function index()
    {   
        $posts = Post::with('category')->orderBy('id', 'desc')->paginate(3);
        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {   
        $post_raw1 = Post::with('category')->orderByRaw("RAND()")->first();
        $post_raw2 = Post::with('category')->orderByRaw("RAND()")->first();
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->view +=1;
        $post->update();
        $comments = Comment::with('user')->where('post_id', $post->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('posts.show', compact('post', 'post_raw1', 'post_raw2', 'comments'));
    }
}
