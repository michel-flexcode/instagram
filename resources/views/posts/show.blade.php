    {{-- <x-user-layout>

        <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-md shadow-md">


            <div class="mb-4">
                <img src="{{ $post->image_url }}" alt="{{ $post->description }}" class="w-full h-auto rounded-md">
            </div>

            <h1 class="text-2xl font-semibold mb-4">{{ $post->description }}</h1>
            <p class="text-gray-700">{{ $post->user->name }}</p>
            <p class="text-gray-500">{{ $post->created_at->diffForHumans() }}</p>

            <div class="mt-8">
                <a href="{{ route('posts.index') }}" class="text-blue-500 hover:underline">Back to Posts</a>
            </div>
        </div>

    </x-user-layout> --}}

    <x-user-layout>

        <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-md shadow-md">
            <h2 class="text-2xl font-semibold mb-4">{{ $post->description }}</h2>

            <div class="mb-4">
                <img src="{{ $post->image_url }}" alt="{{ $post->description }}" class="w-full h-auto rounded-md">
            </div>

            <p class="text-gray-700">{{ $post->user->name }}</p>
            <p class="text-gray-500">{{ $post->created_at->diffForHumans() }}</p>

            {{-- Add other details you want to display about the post --}}

            <div class="mt-8">
                <a href="{{ route('posts.index') }}" class="text-blue-500 hover:underline">Back to Posts</a>
            </div>
        </div>


        <div class="mt-8">
            <h2 class="font-bold text-xl mb-4">comments</h2>

            <div class="flex-col space-y-4">
                @forelse ($post->comments as $comment)
                    <div class="flex bg-white rounded-md shadow p-4 space-x-4">
                        <div class="flex justify-start items-start h-full">
                            <x-avatar class="h-10 w-10" :user="$comment->user" />
                        </div>
                        <div class="flex flex-col justify-center">
                            <div class="text-gray-700">
                                {{ $comment->user->name }}
                            </div>
                            <div class="text-gray-500">
                                {{ $comment->created_at->diffForHumans() }}
                            </div>
                            <div class="text-gray-700">
                                {{ $comment->body }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex bg-white rounded-md shadow p-4 space-x-4">
                        Aucun commentaire pour l'instant
                    </div>
                @endforelse
            </div>
    </x-user-layout>
