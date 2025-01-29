<x-app-layout>
    <style>
        /* Modern Cards & Layout */
        .magazine {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Header Section */
        .header {
            position: sticky;
            top: 0;
            z-index: 10;
            background: var(--bg-color);
            backdrop-filter: blur(10px);
            margin-bottom: 2rem;
        }

        .search-bar {
            display: flex;
            gap: 1rem;
            align-items: center;
            padding: 1.5rem;
            background: var(--bg-neutral-2);
            border: 1px solid var(--bg-neutral-3);
            border-radius: var(--radius-l);
        }

        .search-bar h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--font-color);
            margin-right: auto;
        }

        .search-input {
            width: 300px;
            padding: 0.75rem 1rem;
            background: var(--bg-neutral-1);
            border: 1px solid var(--bg-neutral-3);
            border-radius: var(--radius-m);
            color: var(--font-color);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(31, 136, 61, 0.1);
        }

        /* Filter Section */
        .filters {
            display: flex;
            gap: 0.5rem;
            padding: 0.5rem;
            background: var(--bg-neutral-2);
            border: 1px solid var(--bg-neutral-3);
            border-radius: var(--radius-l);
            margin-bottom: 2rem;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .filters::-webkit-scrollbar {
            display: none;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            border-radius: var(--radius-m);
            border: none;
            background: transparent;
            color: var(--divider-color);
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .filter-btn.active {
            background: var(--primary-color);
            color: var(--bg-color);
        }

        .filter-btn:hover:not(.active) {
            color: var(--font-color);
            background: var(--bg-neutral-3);
        }

        /* Issues Grid */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .issue {
            background: var(--bg-neutral-2);
            border-radius: var(--radius-l);
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid var(--bg-neutral-3);
        }

        .issue:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        .cover {
            position: relative;
            height: 400px;
            overflow: hidden;
        }

        .cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .issue:hover .cover img {
            transform: scale(1.05);
        }

        .badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--primary-color);
            color: var(--bg-color);
            padding: 0.25rem 0.75rem;
            border-radius: var(--radius-s);
            font-size: 0.75rem;
            font-weight: 500;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .content {
            padding: 1.5rem;
        }

        .content h2 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--font-color);
            margin-bottom: 1rem;
        }

        .meta {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: var(--divider-color);
            padding-bottom: 1rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid var(--bg-neutral-3);
        }

        .actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }

        .actions a {
            padding: 0.75rem;
            border-radius: var(--radius-m);
            text-align: center;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .actions a:first-child {
            background: var(--primary-color);
            color: var(--bg-color);
        }

        .actions a:last-child {
            background: var(--secondary-color);
            color: var(--bg-color);
        }

        .actions a:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .magazine {
                padding: 1rem;
            }

            .search-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .search-input {
                width: 100%;
            }

            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="magazine">
        <header class="header">
            <div class="search-bar">
                <h1>Magazine Issues</h1>
                <input type="text" class="search-input" placeholder="Search issues...">

                @if (Auth::user()->isEditor())
                    <x-button href="#" class="btn-primary">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M8 1v14M1 8h14" />
                        </svg>
                        New Issue
                    </x-button>
                @endif

            </div>

            {{-- <div class="filters">
                <button class="filter-btn active">All Issues</button>
                <button class="filter-btn">Latest</button>
                <button class="filter-btn">Most Read</button>
                <button class="filter-btn">Featured</button>
                <button class="filter-btn">Archived</button>
            </div> --}}
        </header>

        <main class="grid">

            @foreach ($issues as $issue)
                <article class="issue">
                    <div class="cover">
                        <img src="{{ asset($issue->image) }}" alt="January 2025">
                        <span class="badge">New</span>
                    </div>
                    <div class="content">
                        <h2>{{ $issue->title }}</h2>
                        <div class="meta">
                            <span>Issue #124</span>
                            <span>Published: {{ $issue->publication_date->diffForHumans() }}</span>
                            <span>84 pages • {{ count($issue->articles) }}</span>
                            {{-- <span>By: {{ '@' . $issue->owner }}</span> --}}
                            <span>Updated: {{ $issue->updated_at->diffForHumans() }}</span>
                        </div>
                        <div class="actions">
                            <x-button class="btn-primary" href="{{ route('magazines.show', ['issue' => $issue]) }}">Read
                                Now</x-button>
                            <x-button href="#">Download</x-button>
                        </div>
                    </div>
                </article>
            @endforeach
            <!-- Repeat for second issue -->
        </main>
    </div>
</x-app-layout>
