<x-user-layout>

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

</x-user-layout>
