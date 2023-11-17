<h1>Liste des articles</h1>
<ul>
    @foreach ($posts as $post)
        <li>{{ $post->image_url }}</li>
        <li>{{ $post->description }}</li>
    @endforeach
</ul>
