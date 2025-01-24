<x-app-layout>
    {{-- @if (session('error'))
        <div style="color: #F14336">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div style="color: var(--primary-color)">
            {{ session('success') }}
        </div>
    @endif

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
    {{ $articles }}

    <div>

        <x-button class="btn-primary fit-w" href="{{ route('article.create', ['theme' => $theme->id]) }}">Create an
            article</x-button>
    </div>



    @if ((Auth::user()->isAdmin() && $theme->manager_id == Auth::user()->id) || Auth::user()->isEditor())
        <div>
            <form method="POST" action="{{ route('themes.destroy', ['id' => $theme->id]) }}">
                @csrf
                @method('DELETE')
                <x-button type="submit" class="btn-danger outline fit-w" href="">DeleteTheme</x-button>
            </form>
        </div>
    @endif



    @if (!Auth::user()->isSubscribedToTheme($theme->id))
        <div>
            <form method="POST" action="{{ route('subscriptions.store') }}">
                @csrf
                <input type="hidden" name="theme_id" value="{{ $theme->id }}">
                <x-button type="submit" class="btn-secondary outline fit-w">Subscribe</x-button>
            </form>
        </div>
    @endif --}}


    <div class="theme-page">
        <!-- Alert Messages -->
        @if (session('error'))
            <div class="alert error">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Theme Header -->
        <div class="header">
            <img src="{{ str_starts_with($theme->image, 'http') ? $theme->image : asset($theme->image) }}"
                alt="{{ $theme->name }}">
            <h1>{{ $theme->name }}</h1>
            <p>{{ $theme->description }}</p>
            <div class="metadata">
                <span>Created by: {{ $theme->manager->name }}</span>
                <span>{{ $theme->created_at }}</span>
            </div>
        </div>

        <!-- Related Articles -->
        <div class="articles">
            <h2>Related Articles</h2>

            @if ($articles->count() > 0)
                <div class="grid">
                    @foreach ($articles as $article)
                        <article>
                            <a style="all: unset;cursor: pointer;"
                                href="{{ route('articles.show', ['theme' => $theme->id, 'article' => $article->id]) }}">
                                <h3>{{ $article->title }}</h3>
                                <div class="metadata">
                                    <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset($theme->image) }}"
                                        alt="">
                                    <span>Status: {{ $article->public ? 'Public' : 'Private' }}</span>
                                    <span>Last updated: 2025-01-24 23:09:57</span>
                                    <span>By: @someone here</span>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            @else
                <p class="empty">No articles found for this theme.</p>
            @endif

            <!-- Actions -->
            <div class="actions">
                <a href="{{ route('article.create', ['theme' => $theme->id]) }}" class="btn primary">
                    Create New Article
                </a>

                @if (!Auth::user()->isSubscribedToTheme($theme->id))
                    <form method="POST" action="{{ route('subscriptions.store') }}">
                        @csrf
                        <input type="hidden" name="theme_id" value="{{ $theme->id }}">
                        <button type="submit" class="btn secondary">Subscribe</button>
                    </form>
                @endif

                @if ((Auth::user()->isAdmin() && $theme->manager_id == Auth::user()->id) || Auth::user()->isEditor())
                    <form method="POST" action="{{ route('themes.destroy', ['id' => $theme->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn danger">Delete Theme</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
