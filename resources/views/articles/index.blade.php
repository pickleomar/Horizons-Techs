<x-app-layout>
    @foreach ($articles as $article)
        <h1>{{ $article->title }}</h1>
        <p>{{ $article->content }}</p>
        <img src="{{ asset($article->image) }}" alt="">
    @endforeach
</x-app-layout>
