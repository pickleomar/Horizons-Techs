<x-app-layout>
    <style>
        .issue-page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Issue Header */
        .issue-header {
            background: var(--bg-neutral-2);
            border: 1px solid var(--bg-neutral-3);
            border-radius: var(--radius-l);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .issue-cover {
            position: relative;
            height: 300px;
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),
                url({{ $issue->image }}) center/cover;
        }

        .issue-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2rem;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            color: var(--text-color);
        }

        .issue-title {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .issue-meta {
            display: flex;
            gap: 1.5rem;
            font-size: 0.875rem;
            color: var(--bg-neutral-4);
        }

        /* Actions Bar */
        .actions-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            border-top: 1px solid var(--bg-neutral-3);
            background: var(--bg-neutral-2);
        }

        .status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--divider-color);
            font-size: 0.875rem;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
        }

        /* Elements Grid */
        .elements-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .elements-title {
            font-size: 1.5rem;
            color: var(--font-color);
        }

        .elements-count {
            color: var(--divider-color);
            font-size: 0.875rem;
        }

        .elements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .element-card {
            background: var(--bg-neutral-2);
            border: 1px solid var(--bg-neutral-3);
            border-radius: var(--radius-m);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .element-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .element-image {
            height: 200px;
            overflow: hidden;
        }

        .element-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .element-card:hover .element-image img {
            transform: scale(1.05);
        }

        .element-content {
            padding: 1.5rem;
        }

        .element-type {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background: var(--primary-color);
            color: var(--bg-color);
            border-radius: var(--radius-s);
            font-size: 0.75rem;
            margin-bottom: 1rem;
        }

        .element-title {
            font-size: 1.25rem;
            color: var(--font-color);
            margin-bottom: 1rem;
        }

        .element-metadata {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: var(--divider-color);
            padding-top: 1rem;
            border-top: 1px solid var(--bg-neutral-3);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-m);
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--primary-color);
            color: var(--bg-color);
        }

        .btn-secondary {
            background: var(--secondary-color);
            color: var(--bg-color);
        }

        @media (max-width: 768px) {
            .issue-page {
                padding: 1rem;
            }

            .issue-title {
                font-size: 1.5rem;
            }

            .issue-meta {
                flex-direction: column;
                gap: 0.5rem;
            }

            .actions-bar {
                flex-direction: column;
                gap: 1rem;
            }

            .elements-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="issue-page">
        <!-- Issue Header -->
        <header class="issue-header">
            <div class="issue-cover">
                <div class="issue-info">
                    <h1 class="issue-title">January 2025 Edition</h1>
                    <div class="issue-meta">
                        <span>Issue #{{ $issue->id }}</span>
                        <span>Published: {{ $issue->publication_date->format('d.M.Y') }}</span>
                        <span>84 pages</span>
                        <span>{{ count($issue->articles) }} articles</span>
                    </div>
                </div>
            </div>
            <div class="actions-bar">
                <div class="status">
                    {{-- <span>Last updated by @regisx001</span>
                    <span>•</span>
                    <span>2025-01-29 03:11:10</span> --}}
                </div>
                {{-- <div class="action-buttons">
                    <a href="#" class="btn btn-primary">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 5l-8 8M12 13l-8-8" />
                        </svg>
                        Edit Issue
                    </a>
                    <a href="#" class="btn btn-secondary">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 12v4h4l8-8-4-4-8 8z" />
                        </svg>
                        New Element
                    </a>
                </div> --}}
            </div>
        </header>

        <!-- Elements Section -->
        <section>
            <div class="elements-header">
                <h2 class="elements-title">Issue Elements</h2>
                <span class="elements-count">{{ count($issue->articles) }} elements</span>
            </div>

            <div class="elements-grid">

                @foreach ($issue->articles as $article)
                    <a style="all: unset;cursor: pointer;"
                        href="{{ route('magazines.show.article', ['issue' => $issue, 'article' => $article]) }}">

                        <article class="element-card">
                            <div class="element-image">
                                <img src="{{ asset($article->image) }}" alt="AI Revolution">
                            </div>
                            <div class="element-content">
                                <span class="element-type">Article</span>
                                <h3 class="element-title">{{ $article->title }}</h3>
                                <div class="element-metadata">
                                    <span>Created by {{ '@' . $article->author->name }}</span>
                                    <span>Updated: {{ $article->updated_at->diffForHumans() }}</span>
                                    <span>Status: {{ $article->status }}</span>
                                </div>
                            </div>
                        </article>
                    </a>
                @endforeach

            </div>
        </section>
    </div>
</x-app-layout>
