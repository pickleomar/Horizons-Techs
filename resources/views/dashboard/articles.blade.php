<x-dashboard-layout>
    <style>
        #header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--bg-neutral-3);
        }

        #user-info {
            color: var(--divider-color);
            font-size: 0.9rem;
            text-align: right;
        }

        #articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
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

        .status {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: var(--radius-m);
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .status-pending {
            background: var(--warning-color);
        }

        .status-approved {
            background: var(--primary-color);
        }

        .status-rejected {
            background: var(--danger-color);
        }

        .status-published {
            background: var(--primary-color);
        }

        .article-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }

        #toast {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            padding: 1rem 1.5rem;
            border-radius: var(--radius-m);
            background: var(--bg-neutral-2);
            color: var(--font-color);
            display: none;
            animation: slideIn 0.3s ease-out;
            border-left: 4px solid var(--primary-color);
        }


        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            #articles-grid {
                grid-template-columns: 1fr;
            }

            .article-actions {
                flex-direction: column;
            }

            button {
                width: 100%;
            }
        }
    </style>


    <section class="dashboard-section">

        <header id="header">
            <h1>My Articles</h1>
            <div id="user-info">
                <div>{{ '@' . Auth::user()->name }}</div>
                <div>{{ now() }}</div>
            </div>
        </header>

        <div id="articles-grid">
            <!-- Approved Article Template -->
            @foreach ($articles as $article)
                <article class="article-card">
                    <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset($article->image) }}"
                        alt="The Future of Web Development" class="article-image">
                    <div class="article-content">
                        <h2 class="article-title">{{ $article->title }}</h2>
                        <div class="article-date">Created: {{ $article->created_at }}</div>
                        <p class="article-preview">
                            {{ $article->content }}
                        </p>
                        @switch($article->status)
                            @case('Rejected')
                                <span class="status status-rejected">{{ $article->status }}</span>

                                <div class="article-actions">
                                    <x-button href="{{ route('article.edit', ['article' => $article]) }}"
                                        class="btn-secondary">Edit</x-button>
                                    <x-button class="btn-primary">Request</x-button>


                                    <x-button onclick="showDeleteDialog({{ $article->id }})"
                                        class="btn-danger">Delete</x-button>
                                </div>
                            @break

                            @case('Approved')
                                <span class="status status-approved">{{ $article->status }}</span>
                                <div class="article-actions">

                                    <form method="post"
                                        action="{{ route('articles.publish', ['article_id' => $article->id]) }}">
                                        @csrf
                                        <x-button type="submit" class="btn-primary">Publish</x-button>
                                    </form>

                                    @if (!$article->public)
                                        <form method="post"
                                            action="{{ route('articles.make.public', ['article_id' => $article->id]) }}">
                                            @csrf
                                            <x-button type="submit" class="btn-warning">public</x-button>
                                        </form>
                                    @endif

                                    <x-button href="{{ route('article.edit', ['article' => $article]) }}"
                                        class="btn-secondary">Edit</x-button>

                                    <x-button onclick="showDeleteDialog({{ $article->id }})"
                                        class="btn-danger">Delete</x-button>
                                </div>
                            @break

                            @case('Pending')
                                <span class="status status-approved">{{ $article->status }}</span>
                                <div class="article-actions">

                                    <x-button href="{{ route('article.edit', ['article' => $article]) }}"
                                        class="btn-secondary">Edit</x-button>

                                    <x-button onclick="showDeleteDialog({{ $article->id }})"
                                        class="btn-danger">Delete</x-button>
                                </div>
                            @break

                            @case('Published')
                                <span class="status status-approved">{{ $article->status }}</span>
                                <div class="article-actions">

                                    <x-button href="{{ route('article.edit', ['article' => $article]) }}"
                                        class="btn-secondary">Edit</x-button>


                                    @if (!$article->public)
                                        <form method="post"
                                            action="{{ route('articles.make.public', ['article_id' => $article->id]) }}">
                                            @csrf
                                            <x-button type="submit" class="btn-warning">public</x-button>
                                        </form>
                                    @endif

                                    <x-button onclick="showDeleteDialog({{ $article->id }})"
                                        class="btn-danger">Delete</x-button>
                                </div>
                            @break

                            @default
                        @endswitch

                    </div>
                </article>
            @endforeach

        </div>
    </section>



    {{-- Confirmation dialog for deleting --}}
    <div class="overlay" id="overlay"></div>
    <div class="confirmation-dialog" id="deleteDialog">
        <h3 style="margin-bottom: 1rem">Confirm Unsubscribe</h3>
        <p style="margin-bottom: 1.5rem">Are you sure you want to delete from this article?</p>
        <form action="{{ route('articles.destroy') }}" method="POST" id="deleteForm">
            @csrf
            @method('DELETE')
            <input type="hidden" name="article_id" id="articleIdInput">
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
        function showDeleteDialog(articleId) {
            document.getElementById('articleIdInput').value = articleId;
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('deleteDialog').style.display = 'block';
        }

        function hideDeleteDialog() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('deleteDialog').style.display = 'none';
        }
    </script>

</x-dashboard-layout>
