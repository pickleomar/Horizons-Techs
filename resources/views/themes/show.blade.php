<x-app-layout>
    <style>
        .theme-page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .theme-page .alert {
            padding: 1rem;
            border-radius: 0.25rem;
            margin-bottom: 1rem;
        }

        .theme-page .alert.success {
            background-color: rgba(31, 136, 61, 0.1);
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
        }

        .theme-page .alert.error {
            background-color: rgba(207, 34, 46, 0.1);
            border: 1px solid var(--danger-color);
            color: var(--danger-color);
        }

        .theme-page .header {
            background-color: var(--bg-neutral-2);
            border-radius: 0.5rem;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid var(--bg-neutral-3);
        }

        .theme-page .header img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 0.25rem;
            margin-bottom: 1.5rem;
        }

        .theme-page .header h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--font-color);
        }

        .theme-page .header p {
            color: var(--divider-color);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .theme-page .metadata {
            display: flex;
            gap: 1rem;
            color: var(--bg-neutral-4);
            font-size: 0.875rem;
        }

        .theme-page .articles {
            background-color: var(--bg-neutral-2);
            border-radius: 0.5rem;
            padding: 2rem;
            border: 1px solid var(--bg-neutral-3);
        }

        .theme-page .articles h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: var(--font-color);
        }

        .theme-page .articles .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .theme-page .articles article {
            background-color: var(--bg-neutral-3);
            border-radius: 0.25rem;
            padding: 1.5rem;
            transition: transform 0.2s;
        }


        .theme-page .articles article h3 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: var(--font-color);
        }

        .theme-page .articles article .metadata {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .theme-page .empty {
            color: var(--bg-neutral-4);
            text-align: center;
            padding: 2rem;
        }

        .theme-page .actions {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .theme-page .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            border-radius: 0.25rem;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: opacity 0.2s;
            width: 100%;
        }

        .theme-page .btn:hover {
            opacity: 0.9;
        }

        .theme-page .btn.primary {
            background-color: var(--primary-color);
            color: var(--font-color);
        }

        .theme-page .btn.secondary {
            background-color: var(--secondary-color);
            color: var(--font-color);
        }

        .theme-page .btn.danger {
            background-color: var(--danger-color);
            color: var(--font-color);
        }

        @media (max-width: 768px) {
            .theme-page {
                padding: 1rem;
            }

            .theme-page .header img {
                height: 200px;
            }

            .theme-page .header h1 {
                font-size: 1.5rem;
            }

            .theme-page .articles .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>


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
