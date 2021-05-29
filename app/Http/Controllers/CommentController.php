<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request, $slug, $id)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $post = Post::where('slug', $slug)->first();
        $user = User::find($id);

        Comment::create([
            'post_id' => $post->id,
            'user_id' => $user->id,
            'comment' => $request->comment,
        ]);

        $post->comments += 1;
        $post->update();
        $user->comments += 1;
        $user->update();

        return redirect()->route('posts.single', ['slug' => $slug]);
    }
}
