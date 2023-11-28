<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class FeedController extends Controller
{
    public function feed()
    {
        $posts = Post::paginate(8);

        return view('pages.feed', [
            'posts' => $posts,
        ]);
    }

    public function show($id)
    {
        // Fetch a single post by its ID
        $post = Post::findOrFail($id);

        // Fetch comments for the post
        $descriptions = $post->descriptions()->with('user')->orderBy('created_at')->get();

        return view('posts.show', [
            'post' => $post,
            'descriptions' => $descriptions,
        ]);
    }


    //         Public function udpdate (Post $post, FormpostsRequest  $request)
    //     {   $data = request->validated();
    //         /** @var UploadedFile | null $image */
    //         $image = $request->validated('image');
    //         $dd = $data;
    //         $post->update($data);
    //         $post->tags()->sync($request->validated('tags'));
    //         return redirect()->route('blog.show',['slug'->$post->slug,'post'->$post->$id])->width('success', "Le post a été")
    // //dd($data) permet de vérrifier si cest envoyer

    // //  /** @var UploadedFile | null $image */
    // // $image = request->validated(‘image’);}

}
