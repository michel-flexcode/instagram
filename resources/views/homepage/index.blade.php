<x-guest-layout>
    {{-- <h1 class="font-bold text-xl mb-4">Liste des articles</h1>
    <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
        <ul>
            @foreach ($posts as $post)
                <li>{{ $post->image_url }}</li>
                <li>{{ $post->description }}</li>
            @endforeach
        </ul>
    </ul> --}}

    {{-- LE SLOT REMPLACE CECI ET PAS BESOIN DE DOUBLON --}}
    {{-- <div class="flex items-center space-x-4">

        <a href="{{ route('login') }}" class="font-medium text-gray-600 hover:text-gray-500 transition">Login</a>
        <a href="{{ route('register') }}" class="font-medium text-gray-600 hover:text-gray-500 transition">Register</a>
    </div> --}}
</x-guest-layout>
