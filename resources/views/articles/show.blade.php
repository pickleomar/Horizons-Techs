<x-app-layout>

    {{-- {{ $article }} --}}





    <article class="article">
        <div class="article-image-container">
            <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset($article->image) }}"
                alt="Article Image" class="article-image">
            <div class="article-metadata">
                Published by {{ '@' . $article->author->name }}
            </div>
        </div>
        <div class="article-content">
            <h1 class="article-title">The Art of Web Design</h1>
            <p class="article-description">
                {{ $article->content }}
            </p>

        </div>
        <div class="article-footer">
            <span>Posted on: {{ $article->publication_date }}</span>
            <span>Author: {{ '@' . $article->author->name }}</span>
        </div>
    </article>

</x-app-layout>
