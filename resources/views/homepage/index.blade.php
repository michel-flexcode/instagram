<x-guest-layout>

    <h1>Bienvenue sur Instameme !</h1>

    {{-- <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">

        @foreach ($posts as $post)
            <li>
                <img src="{{ asset($post->image_url) }}" alt="{{ $post->description }}">
            </li>
            <li>{{ $post->description }}</li>
        @endforeach

    </ul> --}}

    <p>Connectez-vous</p>

    {{-- @foreach ($posts as $post)
        <p><a href="{{ route('posts.show', ['id' => $post->id]) }}">Voir les détails</a></p>
    @endforeach --}}

</x-guest-layout>
