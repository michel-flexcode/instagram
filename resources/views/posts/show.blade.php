<x-user-layout>

    <!-- show.blade.php -->

    @extends('layouts.app')

    @section('content')
        <h1>{{ $post->name }}</h1>
        <p>{{ $post->description }}</p>
        <!-- Ajoutez d'autres détails du post selon vos besoins -->
    @endsection


</x-user-layout>
