<nav class="flex justify-between items-center py-4 px-8 bg-gray-100">
    <div class="flex items-center space-x-4">
        <a href="/" class="group font-bold text-3xl flex items-center space-x-4 hover:text-emerald-600 transition">
            <x-application-logo class="w-10 h-10 fill-current text-gray-500 group-hover:text-emerald-500 transition" />
            <span>Instameme</span>
        </a>
    </div>

    <div class="flex items-center space-x-4 cursor-pointer" onclick="goToProfile()">
        <img src="https://placekitten.com/100/100" alt="Profile Picture" class="rounded-full w-10 h-10 mr-2">
        <div class="flex items-center space-x-4">
            <a href="{{ route('profile.update') }}"
                class="font-medium text-gray-600 hover:text-gray-500 transition">{{ Auth::user()->name }}</a>
        </div>

        <div class="flex items-center space-x-4 cursor-pointer">
            <a href="http://instameme.test/posts/create" class="flex items-center space-x-4">
                <img src="https://placekitten.com/100/100" alt="Profile Picture" class="rounded-full w-10 h-10 mr-2">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('profile.update') }}"
                        class="font-medium text-gray-600 hover:text-gray-500 transition">{{ Auth::user()->name }}</a>
                </div>
            </a>

            <div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit"
                        class="font-medium text-gray-600 hover:text-gray-500 transition">Déconnexion</button>
                </form>
            </div>
        </div>
</nav>
