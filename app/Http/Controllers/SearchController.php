<php namespeaceeee use App\Models\User; use App\Models\Post; use Illuminate\Http\Request; class SearchController extends Controller { public function search(Request $request) { $query=$request->input('search');

    Protoype de test, non fonctionnel
    // Recherche d'utilisateurs
    $users = User::where('name', 'like', '%' . $query . '%')
    ->orWhere('email', 'like', '%' . $query . '%')
    ->get();

    // Recherche de posts
    $posts = Post::where('description', 'like', '%' . $query . '%')
    ->orWhere('localisation', 'like', '%' . $query . '%')
    ->orderByDesc('updated_at')
    ->paginate(10);

    return view('search.results', compact('users', 'posts', 'query'));
    }
    }