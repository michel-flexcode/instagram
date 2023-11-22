<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class FeedController extends Controller
{
    public function feed()
    {
        $posts = Post::paginate(2);

        return view('pages.feed', [
            'posts' => $posts,
        ]);
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
