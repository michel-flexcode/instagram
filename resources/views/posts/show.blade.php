@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->description }}</p>

    <!-- Add other post details as needed -->

    <h2>Comments</h2>
    @foreach ($descriptions as $description)
        <p>{{ $description->content }} by {{ $description->user->name }}</p>
    @endforeach
@endsection
