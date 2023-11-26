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
            'admin.articles.index',
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
    // public function store(PostRequest $request)
    // {
    //     // On crée un nouvel ^post
    //     $posts = Post::make();

    //     // On ajoute les propriétés de l'article
    //     $posts->description = $request->validated()['text'];
    //     $posts->user_id = Auth::id();


    //     // Si il y a une image, on la sauvegarde
    //     if ($request->hasFile('img')) {
    //         $path = $request->file('img')->store('posts', 'public');
    //         $posts->img = $path;
    //     }

    //     // On sauvegarde l'article en base de données
    //     $posts->save();

    //     //pas sur de laa redicrection
    //     return redirect()->route('feed');
    // }
    public function store(PostCreateRequest $request) // Utilisez la classe de demande pour Post
    {
        $post = post::make();
        $post->description = $request->validated()['description']; // Utilisez le nom du champ correct
        $post->user_id = Auth::id();

        // Si une image est présente, sauvegardez-la
        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('posts', 'public');
            $post->img = $path;
        }

        $post->save();

        return redirect()->route('feed'); // Assurez-vous que la redirection pointe vers la bonne route
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
