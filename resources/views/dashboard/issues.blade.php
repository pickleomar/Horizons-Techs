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
            <h1>Issue Management</h1>
            <div id="user-info">
                <x-button href="{{ route('issues.create') }}" class="btn-primary">Create New Issue</x-button>
            </div>
        </header>

        <div id="articles-grid">
            <!-- Approved Article Template -->
            @foreach ($issues as $issue)
                <article class="article-card">
                    <img src="{{ str_starts_with($issue->image, 'http') ? $issue->image : asset($issue->image) }}"
                        alt="The Future of Web Development" class="article-image">
                    <div class="article-content">
                        <h2 class="article-title">{{ $issue->title }}</h2>
                        <div class="article-date">Created: {{ $issue->created_at }}</div>
                        <p class="article-preview">
                            {{ $issue->description }}
                        </p>


                        @switch($issue->public)
                            @case(0)
                                <span class="status status-rejected">Private </span>

                                <div class="article-actions">
                                    <x-button href="{{ route('magazines.show', ['issue' => $issue]) }}"
                                        class="btn-secondary">visite</x-button>


                                    <form method="post" action="{{ route('issues.publish', ['issue_id' => $issue->id]) }}">
                                        @csrf
                                        <x-button type="submit" class="btn-warning">Publish</x-button>
                                    </form>
                                    <x-button type="submit" class="btn-primary">Manage</x-button>



                                    <x-button onclick="" class="btn-danger">Delete</x-button>
                                </div>
                            @break

                            @case(1)
                                <span class="status status-approved">Public</span>
                                <div class="article-actions">

                                    <x-button href="{{ route('magazines.show', ['issue' => $issue]) }}"
                                        class="btn-secondary">visite</x-button>




                                    <form method="post" action="{{ route('issues.private', ['issue_id' => $issue->id]) }}">
                                        @csrf
                                        <x-button type="submit" class="btn-warning">Private</x-button>
                                    </form>

                                    <x-button class="btn-danger">Delete</x-button>
                                </div>
                            @break
                        @endswitch

                    </div>
                </article>
            @endforeach

        </div>
    </section>

</x-dashboard-layout>
