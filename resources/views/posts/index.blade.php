<x-user-layout>

    <div class="bg-gradient-to-b from-blue-500 to-purple-700">

        <div class="flex items-center justify-center">

            <div class="text-center">
                <h1 class="text-4xl font-bold mb-6">Liste des posts</h1>

                <!-- Search Bar -->
                <div class="flex items-center justify-center mb-4">
                    <form action="{{ route('posts.index') }}" method="GET">

                        <input type="text" name="search" id="search" placeholder="Rechercher un post / user"
                            class="border border-gray-300 rounded shadow px-4 py-2 mr-4" value="{{ request()->search }}"
                            autofocus />
                        <button type="submit" class="bg-white text-gray-600 px-4 py-2 rounded-lg shadow">
                            Search
                        </button>
                    </form>
                </div>
            </div>

        </div>

        <!-- Post Listing -->
        <ul class="grid sm:grid-cols-1 lg:grid-cols-1 2xl:grid-cols-1 gap-4 justify-center">
            @foreach ($posts as $post)
                <li class="w-full max-w-2xl mx-auto mt-10 bg-white p-8 rounded-md shadow-md">
                    <!-- Adjust the width here -->
                    <a class="block bg-white rounded-md shadow-md p-2 hover:shadow-lg hover:scale-105 transition"
                        href="{{ route('posts.show', $post) }}">
                        <div class="relative overflow-hidden rounded-md aspect-w-1 aspect-h-1">
                            <img src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->description }}"
                                class="object-cover w-full h-full rounded-md">
                        </div>
                        <div class="flex items-center justify-between mt-2">
                            <div class="flex items-center">
                                <x-avatar class="h-6 w-6" :user="$post->user" />
                                <span class="text-gray-700 ml-2 text-sm">{{ $post->user->name }}</span>
                            </div>
                            <span class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-700 mt-1 text-sm">{{ $post->description }}</p>
                        <p class="text-gray-700 text-sm">{{ $post->localisation }}</p>
                        <p class="text-gray-700 text-sm">{{ $post->date }}</p>
                        <!-- Display Like Count -->
                        <p class="text-gray-700 text-sm">{{ $post->likes->count() }}
                            {{ Str::plural('like', $post->likes->count()) }}</p>
                        @if ($post->comments)
                            <p class="text-gray-700 text-sm">{{ $post->comments->count() }}
                                {{ Str::plural('comment', $post->comments->count()) }}</p>
                        @else
                            <p class="text-gray-700 text-sm">Aucun commentaire</p>
                        @endif
                    </a>
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="mt-8">
            {{ $posts->links() }}
        </div>

    </div>
</x-user-layout>
