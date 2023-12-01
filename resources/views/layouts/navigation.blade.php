<nav class="flex justify-between items-center py-4 px-8 bg-gray-100">
    <div class="flex items-center space-x-4">
        <a href="{{ route('posts.index') }}"
            class="group font-bold text-3xl flex items-center space-x-4 hover:text-emerald-600 transition">
            <x-application-logo class="w-10 h-10 fill-current text-gray-500 group-hover:text-emerald-500 transition" />
            <span>Instameme nav.blade.php</span>
        </a>
    </div>

    <div class="flex items-center space-x-4 cursor-pointer">
        <a href="{{ route('posts.create') }}" class="flex items-center space-x-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create Post
            </button>
        </a>
    </div>

    <div class="flex items-center space-x-4 cursor-pointer">
        <a href="{{ route('profile.update') }}" class="flex items-center space-x-4">
            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Photo de profil"
                class="w-8 h-8 rounded-full">
            <div class="flex items-center space-x-2">
                <span class="font-medium text-gray-600 hover:text-gray-500 transition">{{ Auth::user()->name }}</span>
            </div>
        </a>

        <div>

            <div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit"
                        class="font-medium text-gray-600 hover:text-gray-500 transition">Déconnexion</button>
                </form>
            </div>
        </div>
</nav>
