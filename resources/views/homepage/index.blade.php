<x-guest-layout>

    <div class="flex items-center justify-center h-screen bg-gradient-to-b from-blue-500 to-purple-700">
        <div class="text-center text-white">
            <h1 class="text-4xl font-bold mb-4">Bienvenue sur Instameme !</h1>
            <p class="text-lg mb-8">Découvrez et partagez des mèmes hilarants.</p>

            {{-- Remplacez le chemin de l'image par votre image --}}
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTO9bQ9-vHeqm-_eAsWgiwO8msa37ZC9B17xVGPH8oPiQ&s"
                alt="Description de l'image"
                class="w-full max-w-md mx-auto rounded-md shadow-lg">

            {{-- Formulaire de connexion --}}
            <div class="mt-8">
                <p class="text-lg font-semibold">Connectez-vous pour découvrir plus de contenus !</p>
                {{-- Ajoutez ici le formulaire de connexion --}}
            </div>
        </div>
    </div>

</x-guest-layout>
