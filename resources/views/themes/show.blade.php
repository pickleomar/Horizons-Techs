<x-app-layout>
    {{ $theme }}
    Related Articles
    {{ $theme->articles }}

    <div>

        <x-button class="btn-primary fit-w" href="{{ route('article.create', ['theme' => $theme->id]) }}">Create an
            article</x-button>
    </div>
</x-app-layout>
