<x-guest-layout>

    <style>
        #articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin: 0 15%;
        }

        .article-card {
            background: var(--bg-neutral-2);
            border-radius: var(--radius-l);
            border: 1px solid var(--bg-neutral-3);
            overflow: hidden;
        }


        .article-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: var(--bg-neutral-3);
        }

        .article-content {
            padding: 1.5rem;
        }

        .article-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: var(--font-color);
        }

        .article-date {
            font-size: 0.875rem;
            color: var(--bg-neutral-4);
            margin-bottom: 1rem;
        }

        .article-preview {
            color: var(--divider-color);
            font-size: 0.875rem;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }



        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            #articles-grid {
                grid-template-columns: 1fr;
                margin: 0;
            }

            .article-actions {
                flex-direction: column;
            }

            button {
                width: 100%;
            }
        }
    </style>

    <div id="articles-grid">
        @foreach ($articles as $article)
            <a style="all: unset;cursor: pointer;" href="{{ route('articles.public.show', ['article' => $article]) }}">

                <article class="article-card">
                    <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset($article->image) }}"
                        alt="The Future of Web Development" class="article-image">
                    <div class="article-content">
                        <h2 class="article-title">{{ $article->title }}</h2>
                        <div class="article-date">Created: {{ $article->created_at }}</div>
                        <p class="article-preview">
                            {{ $article->content }}
                        </p>

                    </div>
                </article>
            </a>
        @endforeach

    </div>


</x-guest-layout>
