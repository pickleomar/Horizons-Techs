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
            display: flex;
            justify-content: space-between;
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
            align-items: center;
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
            margin: 1rem;
            border-radius: 1rem;
            margin-bottom: 3rem;
            border: 1px solid var(--border-color);
        }

        .comment-form label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 500;
        }


        .comment-form textarea {
            width: 100%;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border: 1px solid var(--divider-color);
            border-radius: 0.5rem;
            background: var(--bg-neutral-2);
            font-family: inherit;
        }

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
            padding: 1rem;
        }

        .comment {
            background: var(--bg-neutral-3);
            padding: 1.5rem;
            border-radius: 0.5rem;
            position: relative;
        }



        .comment .author {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
        }

        .comment .author:hover {
            color: var(--primary-color);

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


        .breadcrumb-container {
            --breadcrumb-bg: var(--bg-neutral-2);
            --breadcrumb-border: var(--bg-neutral-3);
            --breadcrumb-text: var(--divider-color);
            --breadcrumb-active: var(--primary-color);
            --breadcrumb-hover: var(--secondary-color);

            max-width: 800px;
        }

        .breadcrumb-gradient {
            border-radius: var(--radius-l);
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            position: relative;
            overflow: hidden;
            border: 1px solid var(--breadcrumb-border);
        }


        .breadcrumb-gradient a {
            color: var(--breadcrumb-text);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .breadcrumb-gradient a:hover {
            color: var(--breadcrumb-hover);
        }


        .breadcrumb-gradient .separator {
            color: var(--breadcrumb-border);
            font-size: 0.75rem;
            opacity: 0.7;
        }

        .breadcrumb-gradient .active {
            color: var(--breadcrumb-active);
            font-weight: 500;
        }

        .breadcrumb-content {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        @media (max-width: 768px) {
            .breadcrumb-container {
                padding: 0 1rem;
                margin: 1rem auto;
            }

            .breadcrumb-gradient {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
                padding: 1rem;
            }


        }
    </style>

    <article class="article">
        <div class="breadcrumb-container">
            <nav class="breadcrumb-gradient">
                <div class="breadcrumb-content">
                    <a href="{{ route('home') }}">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>
                        Home
                    </a>
                    <span class="separator">⟩</span>
                    <a href="{{ route('themes.show', ['theme' => $article->theme]) }}">{{ $article->theme->name }}</a>
                    <span class="separator">⟩</span>
                    <span class="active">{{ $article->title }}</span>
                </div>

                @auth

                    @if (Auth::user()->role === 'editor' ||
                            (Auth::user()->role === 'admin' && Auth::user()->id === $article->theme->manager_id))
                        <form method="post" action="{{ route('articles.destroy') }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <x-button type="submit" size="sm" class="btn-danger outline">delete</x-button>
                        </form>
                    @endif
                @endauth

            </nav>
        </div>
        <div class="article-image-container">
            <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset($article->image) }}"
                alt="Article Image" class="article-image">
            <div class="article-metadata">
                Published by {{ '@' . $article->author->name }}
                @isset($avgRating)
                    <h3> Rating : {{ $avgRating }}</h3>
                @endisset
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
        @isset($avgRating)

            <div class="rating-section">
                <p class="current-user">Rating as: {{ '@' . Auth::user()->name }}</p>
                <form class="rating-form" method="GET"
                    action="{{ route('rate.article', ['theme' => $article->theme_id, 'article' => $article->id]) }}">
                    @csrf
                    <div class="stars">
                        @for ($i = 5; $i >= 1; $i--)
                            <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}"
                                class="star-radio" @if (optional($userRating)->rating == $i) checked @endif>
                            <label for="star{{ $i }}" class="star-label">★</label>
                        @endfor
                    </div>
                    <x-button type="submit" class="rating-submit">Submit Rating</x-button>
                </form>
            </div>
        @endisset


        <div class="comments-section">
            <h2>Comments</h2>
            @auth

                <div class="comment-form">
                    <form method="POST" action="{{ route('chats.store') }}">
                        @csrf

                        <label for="comment-content">Comment</label>
                        <textarea id="comment-content" name="message" rows="4" placeholder="Write your thoughts..." required></textarea>
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
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

            @endauth

            <ul class="comments-list">

                @foreach ($article->chats as $chat)
                    <li class="comment">
                        <div style="display: flex;justify-content: space-between">
                            <div class="author">{{ $chat->user->name }}</div>
                            @auth

                                @if (Auth::user()->role === 'editor' ||
                                        (Auth::user()->role === 'admin' && Auth::user()->id === $article->theme->manager_id) ||
                                        Auth::user()->id === $chat->user_id)
                                    <x-button size="sm" onclick="showDeleteDialog({{ $chat->id }})"
                                        class="btn-danger outline">delete</x-button>
                                @endif
                            @endauth
                        </div>
                        <div class="timestamp">{{ $chat->message_date }}</div>
                        <div class="content">
                            {{ $chat->message }}
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>

    </article>



    {{-- Confirmation dialog for deleting --}}
    <div class="overlay" id="overlay"></div>
    <div class="confirmation-dialog" id="deleteDialog">
        <h3 style="margin-bottom: 1rem">Confirm Delete comment</h3>
        <p style="margin-bottom: 1.5rem">Are you sure you want to delete this comment ?</p>
        <form action="{{ route('chats.destroy') }}" method="POST" id="deleteForm">
            @csrf
            @method('DELETE')
            <input type="hidden" name="chat_id" id="chatIdInput">
            <div style="display: flex; gap: 1rem;">
                <button type="button" class="btn btn-secondary" onclick="hideDeleteDialog()">
                    Cancel
                </button>
                <button type="submit" class="btn btn-warning">
                    Confirm Delete
                </button>
            </div>
        </form>
    </div>

    <script>
        function showDeleteDialog(chatId) {
            document.getElementById('chatIdInput').value = chatId;
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('deleteDialog').style.display = 'block';
        }

        function hideDeleteDialog() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('deleteDialog').style.display = 'none';
        }
    </script>

</x-app-layout>
