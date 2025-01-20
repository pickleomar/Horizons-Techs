<x-app-layout>
    <div style="color: #F14336">
        {{ implode('', $errors->get('error')) }}
    </div>

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
            <form method="POST" action="{{ route('themes.destroy', ['id' => $theme->id]) }}">
                @csrf
                @method('DELETE')
                <x-button type="submit" class="btn-danger outline fit-w" href="">DeleteTheme</x-button>
            </form>
        </div>
    @endif



    {{-- @if ((Auth::user()->role == 'admin' && $theme->manager_id == Auth::user()->id) || Auth::user()->isEditor()) --}}
    <div>
        <form method="POST" action="{{ route('subscriptions.store') }}">
            @csrf
            <input type="hidden" name="theme_id" value="{{ $theme->id }}">
            <x-button type="submit" class="btn-secondary outline fit-w">Subscribe</x-button>
        </form>
    </div>
    {{-- @endif --}}
</x-app-layout>
