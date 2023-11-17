<h1>Liste des articles</h1>
<ul>
    @foreach ($posts as $article)
        <li>{{ $article->title }}</li>
    @endforeach
</ul>
