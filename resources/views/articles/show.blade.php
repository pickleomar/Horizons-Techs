<x-app-layout>
    <style>
        .article {

            max-width: 800px;
            margin: 1rem auto;
            background-color: var(--bg-neutral-2);
            border-radius: var(--radius-l);
            border: 1px solid var(--bg-neutral-3);
            overflow: hidden;
        }

        .article-image-container {
            position: relative;
            width: 100%;
            height: 400px;
            overflow: hidden;
        }

        .article-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .article-metadata {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: linear-gradient(transparent, var(--bg-neutral-1));
            color: var(--font-color);
            font-size: 0.875rem;
        }

        .article-content {
            padding: 24px;
        }

        .article-title {
            font-size: 32px;
            margin-bottom: 16px;
            color: var(--font-color);
        }

        .article-description {
            font-size: 16px;
            color: var(--divider-color);
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .article-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--bg-neutral-3);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--bg-neutral-3);
            font-size: 0.875rem;
            color: var(--divider-color);
        }

        @media (max-width: 600px) {
            .article-image-container {
                height: 250px;
            }

            .article-title {
                font-size: 24px;
            }

            .article-description {
                font-size: 14px;
            }
        }
    </style>




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
