<x-app-layout>
    <style>
        .theme-page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Header Section */
        .theme-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 2rem;
            gap: 2rem;
        }

        .theme-info {
            flex: 1;
        }

        .theme-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            min-width: 200px;
        }

        /* Main Content */
        .theme-content {
            background-color: var(--bg-neutral-2);
            border-radius: var(--radius-l);
            border: 1px solid var(--bg-neutral-3);
            overflow: hidden;
        }

        .theme-hero {
            position: relative;
            height: 400px;
            overflow: hidden;
        }

        .theme-hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .theme-hero:hover img {
            transform: scale(1.05);
        }

        .theme-details {
            padding: 2rem;
        }

        .theme-title {
            font-size: 2rem;
            font-weight: 600;
            color: var(--font-color);
            margin-bottom: 1rem;
        }

        .theme-description {
            color: var(--divider-color);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .theme-metadata {
            display: flex;
            gap: 1.5rem;
            color: var(--bg-neutral-4);
            font-size: 0.875rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--bg-neutral-3);
        }

        /* Articles Section */
        .articles-section {
            margin-top: 2rem;
            background-color: var(--bg-neutral-2);
            border-radius: var(--radius-l);
            border: 1px solid var(--bg-neutral-3);
            padding: 2rem;
        }

        .articles-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .articles-title {
            font-size: 1.5rem;
            color: var(--font-color);
            font-weight: 500;
        }

        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .article-card {
            all: unset;
            cursor: pointer;
            border: 1px solid var(--bg-neutral-3);
            border-radius: var(--radius-m);
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
        }

        .article-title {
            font-size: 1.25rem;
            color: var(--font-color);
            margin-bottom: 1rem;
        }

        .article-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: var(--radius-s);
            margin-bottom: 1rem;
        }

        .article-metadata {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            color: var(--divider-color);
            font-size: 0.875rem;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--divider-color);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .theme-page {
                padding: 1rem;
            }

            .theme-header {
                flex-direction: column;
            }

            .theme-hero {
                height: 250px;
            }

            .theme-actions {
                width: 100%;
            }

            .btn {
                width: 100%;
            }
        }
    </style>

    <div class="theme-page">
        <div class="theme-header">
            <div class="theme-info">
                <h1 class="theme-title">{{ $theme->name }}</h1>
                <div class="theme-metadata">
                    <span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        {{ $theme->manager->name }}
                    </span>
                    <span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        {{ $theme->created_at->diffForHumans() }}
                    </span>
                </div>
            </div>

            <div class="theme-actions">
                <x-button href="{{ route('article.create', ['theme' => $theme->id]) }}" class="btn-primary">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    New Article
                </x-button>

                @if (!Auth::user()->isSubscribedToTheme($theme->id))
                    <form method="POST" action="{{ route('subscriptions.store') }}" class="w-full">
                        @csrf
                        <input type="hidden" name="theme_id" value="{{ $theme->id }}">
                        <x-button type="submit" class="btn-secondary">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                            </svg>
                            Subscribe
                        </x-button>
                    </form>
                @endif

                @if ((Auth::user()->isAdmin() && $theme->manager_id == Auth::user()->id) || Auth::user()->isEditor())
                    <form method="POST" action="{{ route('themes.destroy') }}" class="w-full">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="theme_id" value="{{ $theme->id }}">
                        <x-button type="submit" class="btn-danger">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path
                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                </path>
                            </svg>
                            Delete
                        </x-button>
                    </form>
                @endif
            </div>
        </div>

        <!-- Alert Messages -->
        @if (Auth::user()->isRequestedSubscription($theme->id) && !Auth::user()->isSubscribedToTheme($theme->id))
            <div class="alert alert-success">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                Your subscription request is pending approval
            </div>
        @endif

        <!-- Theme Content -->
        <div class="theme-content">
            <div class="theme-hero">
                <img src="{{ str_starts_with($theme->image, 'http') ? $theme->image : asset($theme->image) }}"
                    alt="{{ $theme->name }}">
            </div>
            <div class="theme-details">
                <p class="theme-description">{{ $theme->description }}</p>
            </div>
        </div>

        <!-- Articles Section -->
        @if (Auth::user()->isSubscribedToTheme($theme->id))
            <div class="articles-section">
                <div class="articles-header">
                    <h2 class="articles-title">Related Articles</h2>
                    <span class="text-sm text-gray-500">{{ $articles->count() }} articles</span>
                </div>

                @if ($articles->count() > 0)
                    <div class="articles-grid">
                        @foreach ($articles as $article)
                            <a href="{{ route('articles.show', ['theme' => $theme->id, 'article' => $article->id]) }}"
                                class="article-card">
                                <h3 class="article-title">{{ $article->title }}</h3>
                                <img class="article-image"
                                    src="{{ str_starts_with($article->image, 'http') ? $article->image : asset($article->image) }}"
                                    alt="{{ $article->title }}">
                                <div class="article-metadata">
                                    <span>{{ $article->public ? 'Public' : 'Private' }}</span>
                                    <span>Last updated: {{ $article->updated_at->diffForHumans() }}</span>
                                    <span>By: {{ $article->author->name }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <p class="mt-4">No articles found for this theme yet.</p>
                        <a href="{{ route('article.create', ['theme' => $theme->id]) }}"
                            class="btn btn-primary mt-4">
                            Create the first article
                        </a>
                    </div>
                @endif
            </div>
        @endif
    </div>
</x-app-layout>
