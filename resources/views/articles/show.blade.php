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

        .rating-section {
            padding: 24px;
            background-color: var(--bg-neutral-2);
            border-top: 1px solid var(--bg-neutral-3);
        }

        .rating-title {
            color: var(--font-color);
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .rating-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .stars {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .star-radio {
            display: none;
        }

        .star-label {
            cursor: pointer;
            font-size: 1.5rem;
            color: var(--bg-neutral-4);
            transition: color 0.2s;
        }

        .star-radio:checked+.star-label,
        .star-radio:checked~.star-label {
            color: var(--primary-color);
        }


        .star-label:hover,
        .star-label:hover~.star-label {
            color: var(--primary-color);
        }

        .rating-input {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--bg-neutral-1);
            border: 1px solid var(--bg-neutral-3);
            border-radius: var(--radius-m);
            color: var(--font-color);
            resize: vertical;
            min-height: 100px;
        }

        .rating-input:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .rating-submit {
            align-self: flex-end;
            padding: 0.75rem 1.5rem;
            background-color: var(--primary-color);
            color: var(--font-color);
            border: none;
            border-radius: var(--radius-m);
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .rating-submit:hover {
            opacity: 0.9;
        }

        .current-user {
            color: var(--divider-color);
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .timestamp {
            color: var(--divider-color);
            font-size: 0.875rem;
            text-align: right;
            margin-top: 0.5rem;
        }


        .comments-section {
            margin-top: 3rem;
            padding-top: 2rem;
            padding-bottom: 2rem;
            border-top: 1px solid var(--border-color);
        }

        .comments-section h2 {
            font-size: 1.75rem;
            margin-bottom: 2rem;
            position: relative;
            padding-left: 1.5rem;
        }

        .comments-section h2::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 8px;
            height: 80%;
            background: var(--primary-color);
            border-radius: var(--radius-sm);
        }

        .comment-form {
            background: var(--bg-color);
            padding: 2rem;
            border-radius: var(--radius-md);
            margin-bottom: 3rem;
            border: 1px solid var(--border-color);
        }

        .comment-form label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 500;
        }

        .comment-form input,
        .comment-form textarea {
            width: 100%;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border: 1px solid var(--divider-color);
            border-radius: 0.5rem;
            background: var(--bg-neutral-2);
            font-family: inherit;
        }

        .comment-form input:focus,
        .comment-form textarea:focus {
            outline: none;
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(46, 204, 113, 0.1);
        }

        .comments-list {
            list-style: none;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .comment {
            background: var(--card-bg);
            padding: 1.5rem;
            border-radius: 0.5rem;
            border: 1px solid var(--border-color);
            position: relative;
        }



        .comment .author {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .author::before {
            content: '👤';
            font-size: 0.9em;
        }

        .comment .timestamp {
            color: var(--divider-color);
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .comment .content {
            line-height: 1.7;
            padding-left: 1.5rem;
            border-left: 3px solid var(--divider-color);
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            .article {
                padding: 1.5rem;
                margin: 1rem auto;
            }

            h1 {
                font-size: 2rem;
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



        {{-- Rating Section --}}
        <div class="rating-section">
            <p class="current-user">Rating as: {{ '@' . Auth::user()->name }}</p>
            <form class="rating-form" method="GET">
                @csrf
                <div class="stars">
                    <input type="radio" name="rating" value="5" id="star5" class="star-radio">
                    <label for="star5" class="star-label">★</label>
                    <input type="radio" name="rating" value="4" id="star4" class="star-radio">
                    <label for="star4" class="star-label">★</label>
                    <input type="radio" name="rating" value="3" id="star3" class="star-radio">
                    <label for="star3" class="star-label">★</label>
                    <input type="radio" name="rating" value="2" id="star2" class="star-radio">
                    <label for="star2" class="star-label">★</label>
                    <input type="radio" name="rating" value="1" id="star1" class="star-radio">
                    <label for="star1" class="star-label">★</label>
                </div>
                <x-button type="submit" class="rating-submit">Submit Rating</x-button>
            </form>
        </div>

        <div class="comments-section">
            <h2>Comments</h2>

            <div class="comment-form">
                <form method="POST" action="/submit-comment">
                    <label for="comment-author">Name</label>
                    <input type="text" id="comment-author" name="author" placeholder="Enter your name" required>

                    <label for="comment-content">Comment</label>
                    <textarea id="comment-content" name="content" rows="4" placeholder="Write your thoughts..." required></textarea>

                    <x-button class="btn-primary" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16" style="margin-right: 8px;">
                            <path
                                d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11zM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07zm6.787-8.201L1.591 6.602l4.339 2.76 7.825-7.825z" />
                        </svg>
                        Post Comment
                    </x-button>
                </form>
            </div>

            <ul class="comments-list">

                @foreach ($article->chats as $chat)
                    <li class="comment">
                        <div class="author">{{ $chat->user->name }}</div>
                        <div class="timestamp">{{ $chat->message_date->diffForHumans() }}</div>
                        <div class="content">
                            {{ $chat->message }}
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>

    </article>

</x-app-layout>
