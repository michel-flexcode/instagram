<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderByDesc('updated_at')
            ->paginate(10);

        return view(
            'posts.index',
            [
                'posts' => $posts,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //     // Si il y a une image, on la sauvegarde
    //     if ($request->hasFile('img')) {
    //         $path = $request->file('img')->store('posts', 'public');
    //         $posts->img = $path;
    //     }

    public function store(PostCreateRequest $request)
    {
        $post = Post::make();
        $post->description = $request->validated()['description'];
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->route('feed');
    }





    //Code legacy
    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Post $post)
    // {
    //     //
    // }
    // function non officielle
    // public function show($id)
    // {
    //     $post = Post::findOrFail($id);
    //     return view('posts.show', compact('post'));
    // }

    public function show(Post $post)
    {
        $post = Post::findOrFail($post);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
