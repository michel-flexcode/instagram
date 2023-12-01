<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Requests\CommentCreateRequest;

use Illuminate\Pagination\LengthAwarePaginator;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $posts = Post::orderByDesc('updated_at')
    //         ->paginate(10);

    //     return view(
    //         'posts.index',
    //         [
    //             'posts' => $posts,
    //         ]
    //     );
    // }

    // public function index(Request $request)
    // {
    //     // If there is a search term, apply search filters
    //     if ($request->has('search')) {
    //         $searchTerm = $request->query('search');

    //         // Perform the search on the database
    //         $posts = Post::where('description', 'like', '%' . $searchTerm . '%')
    //             ->orWhereHas('user', function ($query) use ($searchTerm) {
    //                 $query->where('name', 'like', '%' . $searchTerm . '%');
    //             })
    //             ->orWhere('localisation', 'like', '%' . $searchTerm . '%')
    //             ->orderByDesc('updated_at')
    //             ->paginate(10);
    //     } else {
    //         // If no search term, fetch all posts
    //         $posts = Post::orderByDesc('updated_at')->paginate(10);
    //     }

    //     return view('posts.index', ['posts' => $posts]);
    // }

    // public function index(Request $request)
    // {
    //     // Get the authenticated user
    //     $user = auth()->user();

    //     // Get the IDs of users followed by the authenticated user
    //     $followingIds = $user->following()->pluck('users.id');

    //     // If there is a search term, apply search filters
    //     if ($request->has('search')) {
    //         $searchTerm = $request->query('search');

    //         // Perform the search on the database for users followed
    //         $postsFollowed = Post::whereIn('user_id', $followingIds)
    //             ->where(function ($query) use ($searchTerm) {
    //                 $query->where('description', 'like', '%' . $searchTerm . '%')
    //                     ->orWhere('localisation', 'like', '%' . $searchTerm . '%');
    //             })
    //             ->orderByDesc('updated_at')
    //             ->paginate(10);

    //         // Perform the search on the database for all posts
    //         $postsAll = Post::where(function ($query) use ($searchTerm) {
    //             $query->where('description', 'like', '%' . $searchTerm . '%')
    //                 ->orWhere('localisation', 'like', '%' . $searchTerm . '%');
    //         })
    //             ->orderByDesc('updated_at')
    //             ->paginate(10);
    //     } else {
    //         // If no search term, fetch posts for users followed
    //         $postsFollowed = Post::whereIn('user_id', $followingIds)
    //             ->orderByDesc('updated_at')
    //             ->paginate(10);

    //         // Fetch all posts
    //         $postsAll = Post::orderByDesc('updated_at')->paginate(10);
    //     }

    //     // Merge the two sets of posts and remove duplicates
    //     $mergedPosts = $postsFollowed->merge($postsAll)->unique('id');

    //     // Sort the merged posts by updated_at in descending order
    //     $sortedPosts = $mergedPosts->sortByDesc('updated_at');

    //     // Paginate the sorted posts
    //     $paginatedPosts = $this->paginateCollection($sortedPosts, 10);

    //     return view('posts.index', ['posts' => $paginatedPosts]);
    // }

    // public function index(Request $request)
    // {
    //     // Get the authenticated user
    //     $user = auth()->user();

    //     // Get the IDs of users followed by the authenticated user
    //     $followingIds = $user->following()->pluck('users.id');

    //     // If there is a search term, apply search filters
    //     if ($request->has('search')) {
    //         $searchTerm = $request->query('search');

    //         // Perform the search on the database for users followed
    //         $postsFollowed = Post::whereIn('user_id', $followingIds)
    //             ->where(function ($query) use ($searchTerm) {
    //                 $query->whereHas('user', function ($userQuery) use ($searchTerm) {
    //                     $userQuery->where('name', 'like', '%' . $searchTerm . '%');
    //                 })
    //                     ->orWhere('description', 'like', '%' . $searchTerm . '%')
    //                     ->orWhere('localisation', 'like', '%' . $searchTerm . '%');
    //             })
    //             ->orderByDesc('updated_at')
    //             ->get();

    //         // Perform the search on the database for all posts
    //         $postsAll = Post::where(function ($query) use ($searchTerm) {
    //             $query->whereHas('user', function ($userQuery) use ($searchTerm) {
    //                 $userQuery->where('name', 'like', '%' . $searchTerm . '%');
    //             })
    //                 ->orWhere('description', 'like', '%' . $searchTerm . '%')
    //                 ->orWhere('localisation', 'like', '%' . $searchTerm . '%');
    //         })
    //             ->orderByDesc('updated_at')
    //             ->get();
    //     } else {
    //         // If no search term, fetch posts for users followed
    //         $postsFollowed = Post::whereIn('user_id', $followingIds)
    //             ->orderByDesc('updated_at')
    //             ->get();

    //         // Fetch all posts
    //         $postsAll = Post::orderByDesc('updated_at')->get();
    //     }

    //     // Merge the two sets of posts and remove duplicates
    //     $mergedPosts = $postsFollowed->merge($postsAll)->unique('id');

    //     // Sort the merged posts by updated_at in descending order
    //     $sortedPosts = $mergedPosts->sortByDesc('updated_at');

    //     // Paginate the sorted posts
    //     $paginatedPosts = $this->paginateCollection($sortedPosts, 10);

    //     return view('posts.index', ['posts' => $paginatedPosts]);
    // }

    // // Helper method to paginate a collection
    // private function paginateCollection($items, $perPage)
    // {
    //     $currentPage = LengthAwarePaginator::resolveCurrentPage();
    //     $currentItems = $items->slice(($currentPage - 1) * $perPage, $perPage)->all();

    //     return new LengthAwarePaginator($currentItems, count($items), $perPage, $currentPage, [
    //         'path' => LengthAwarePaginator::resolveCurrentPath(),
    //     ]);
    // }

    public function index(Request $request)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Get the IDs of users followed by the authenticated user
        $followingIds = $user->following()->pluck('users.id');

        // If there is a search term, apply search filters
        if ($request->has('search')) {
            $searchTerm = $request->query('search');

            // Perform the search on the database for users followed
            $postsFollowed = Post::whereIn('user_id', $followingIds)
                ->where(function ($query) use ($searchTerm) {
                    $query->whereHas('user', function ($userQuery) use ($searchTerm) {
                        $userQuery->where('name', 'like', '%' . $searchTerm . '%');
                    })
                        ->orWhere('description', 'like', '%' . $searchTerm . '%')
                        ->orWhere('localisation', 'like', '%' . $searchTerm . '%');
                })
                ->orderByDesc('updated_at')
                ->get();

            // Perform the search on the database for all posts
            $postsAll = Post::where(function ($query) use ($searchTerm) {
                $query->whereHas('user', function ($userQuery) use ($searchTerm) {
                    $userQuery->where('name', 'like', '%' . $searchTerm . '%');
                })
                    ->orWhere('description', 'like', '%' . $searchTerm . '%')
                    ->orWhere('localisation', 'like', '%' . $searchTerm . '%');
            })
                ->orderByDesc('updated_at')
                ->get();
        } else {
            // If no search term, fetch posts for users followed
            $postsFollowed = Post::whereIn('user_id', $followingIds)
                ->orderByDesc('updated_at')
                ->get();

            // Fetch all posts
            $postsAll = Post::orderByDesc('updated_at')->get();
        }

        // Get the counts of followers for each user in $postsAll
        $userFollowerCounts = collect($postsAll)->groupBy('user_id')->map->count();

        // Sort $postsAll by follower count in descending order
        $postsAll = $postsAll->sortByDesc(function ($post) use ($userFollowerCounts) {
            return $userFollowerCounts[$post->user_id] ?? 0;
        });

        // Merge the two sets of posts and remove duplicates
        $mergedPosts = $postsFollowed->merge($postsAll)->unique('id');

        // Paginate the merged and sorted posts
        $paginatedPosts = $this->paginateCollection($mergedPosts, 10);

        return view('posts.index', ['posts' => $paginatedPosts]);
    }

    // Helper method to paginate a collection
    private function paginateCollection($items, $perPage)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $items->slice(($currentPage - 1) * $perPage, $perPage)->all();

        return new LengthAwarePaginator($currentItems, count($items), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);
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

    public function store(PostCreateRequest $request)
    {
        $post = Post::make();
        $post->description = $request->validated()['description'];
        $post->localisation = $request->validated()['localisation'];
        $post->date = $request->validated()['date'];
        $post->user_id = Auth::id();

        // Storing the image in the 'posts' directory
        $path = $request->file('image')->store('posts', 'public');

        // Saving the relative path (without 'public') in the database
        $post->image_url = 'posts/' . basename($path);

        $post->save();

        return redirect()->route('posts.index');
    }

    // public function store(PostCreateRequest $request)
    // {
    //     $post = Post::make();
    //     $post->description = $request->validated()['description'];
    //     $post->image_url = $request->validated()['image_url'];
    //     $post->localisation = $request->validated()['localisation'];
    //     $post->date = $request->validated()['date'];
    //     $post->user_id = Auth::id();
    //     $post->save();

    //     return redirect()->route('posts.index');
    // }
    // {
    //     $post = Post::make();
    //     $post->description = $request->validated()['description'];
    //     $post->localisation = $request->validated()['localisation'];
    //     $post->date = $request->validated()['date'];
    //     $post->user_id = Auth::id();

    //     // Storing the image in the 'posts' directory
    //     $path = $request->file('image')->store('posts', 'public');

    //     // Saving the relative path (without 'public') in the database
    //     $post->image_url = 'posts/' . basename($path);

    //     $post->save();

    //     return redirect()->route('posts.index');
    // }


    public function addComment(CommentCreateRequest $request, Post $post)
    {
        // Le reste de votre code pour créer et sauvegarder le commentaire
        $comment = new Comment([
            'content' => $request->validated()['content'],
            'user_id' => Auth::id(),
        ]);

        $post->comments()->save($comment);

        return redirect()->route('posts.show', $post->id);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        // Load the comments for the post, including the associated user
        $comments = $post
            ->comments()
            ->with('user')
            ->orderBy('created_at')
            ->get();

        return view('posts.show', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        //$this->authorize('updatePost', $post);

        $post->description = $request->validated()['description'];
        $post->localisation = $request->validated()['localisation'];
        $post->date = $request->validated()['date'];

        // Check if a new image is provided
        if ($request->hasFile('image')) {
            // Store the new image and update the image_url
            $path = $request->file('image')->store('posts', 'public');
            $post->image_url = asset('storage/' . $path);
        }

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');

    //     // Recherche de posts
    //     $posts = Post::where('description', 'like', '%' . $query . '%')
    //         ->orWhere('localisation', 'like', '%' . $query . '%')
    //         ->orderByDesc('updated_at')
    //         ->paginate(10);

    //     return view(
    //         'posts.index',
    //         [
    //             'posts' => $posts,
    //         ]
    //     );
    // }

    public function like(Post $post)
    {
        auth()->user()->likes()->create(['post_id' => $post->id]);

        return back();
    }

    public function unlike(Post $post)
    {
        auth()->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('search');

    //     // Recherche d'utilisateurs
    //     $users = User::where('name', 'like', '%' . $query . '%')
    //         ->orWhere('email', 'like', '%' . $query . '%')
    //         ->get();

    //     // Recherche de posts
    //     $posts = Post::where('description', 'like', '%' . $query . '%')
    //         ->orWhere('localisation', 'like', '%' . $query . '%')
    //         ->orderByDesc('updated_at')
    //         ->paginate(10);

    //     return view('search.results', compact('users', 'posts', 'query'));
    // }
}
