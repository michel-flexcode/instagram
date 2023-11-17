<x-guest-layout>
    <h1 class="font-bold text-xl mb-4">Liste des articles</h1>
    <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
        <ul>
            @foreach ($posts as $post)
                <li>{{ $post->image_url }}</li>
                <li>{{ $post->description }}</li>
            @endforeach
        </ul>
    </ul>
</x-guest-layout>
