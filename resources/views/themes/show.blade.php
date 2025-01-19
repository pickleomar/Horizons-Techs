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



    @if ((Auth::user()->role == 'admin' && $theme->manager_id == Auth::user()->id) || Auth::user()->isEditor())
        <div>
            <form method="POST" action="{{ route('themes.destroy', ['theme' => $theme->id]) }}">
                @csrf
                @method('DELETE')
                <x-button type="submit" class="btn-danger outline fit-w" href="">DeleteTheme</x-button>
            </form>
        </div>
    @endif
</x-app-layout>
