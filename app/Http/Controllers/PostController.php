<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Post::orderByDesc('updated_at')
            ->paginate(10);

        return view(
            'admin.articles.index',
            [
                'articles' => $articles,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // On crée un nouvel ^post
        $posts = Post::make();

        // On ajoute les propriétés de l'article
        $posts->description = $request->validated()['text'];
        $posts->user_id = Auth::id();


        // Si il y a une image, on la sauvegarde
        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('posts', 'public');
            $posts->img = $path;
        }

        // On sauvegarde l'article en base de données
        $posts->save();

        //pas sur de laa redicrection
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
    public function show($id)
    {
        $post = Post::findOrFail($id);
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
