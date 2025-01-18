<x-app-layout>
    <pre>

        {{ $theme }}
    </pre>
    Related Articles

    @foreach ($articles as $article)
        <pre>
            <span> Theme id {{ $article->theme_id }} </span> <br>
            <span> Title {{ $article->title }} </span> <br>
            <span> Public = {{ $article->public }} </span> <br>
        </pre>
    @endforeach
    {{-- {{ $articles }} --}}

    <div>

        <x-button class="btn-primary fit-w" href="{{ route('article.create', ['theme' => $theme->id]) }}">Create an
            article</x-button>
    </div>
</x-app-layout>
