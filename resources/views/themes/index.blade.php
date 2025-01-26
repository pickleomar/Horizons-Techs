<x-app-layout>
    <style>
        .themes-container {

            max-width: 1200px;
            margin: 1rem auto;
        }

        .header {
            margin-bottom: 2rem;
            padding: 1rem;
            background-color: var(--bg-neutral-2);
            border-radius: var(--radius-l);
            border: 1px solid var(--bg-neutral-3);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .new-theme-btn {
            background-color: var(--primary-color);
            color: var(--font-color);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: var(--radius-m);
            cursor: pointer;
        }

        .new-theme-btn:hover {
            opacity: 0.9;
        }

        .filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .filter-btn {
            background-color: var(--bg-neutral-3);
            color: var(--font-color);
            border: 1px solid var(--bg-neutral-4);
            padding: 0.5rem 1rem;
            border-radius: var(--radius-m);
            cursor: pointer;
        }

        .filter-btn:hover {
            background-color: var(--bg-neutral-4);
        }

        .filter-btn.active {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .themes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .theme-card {
            background-color: var(--bg-neutral-2);
            border-radius: var(--radius-l);
            border: 1px solid var(--bg-neutral-3);
            overflow: hidden;
        }

        .theme-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .theme-content {
            padding: 1rem;
        }

        .theme-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: var(--font-color);
        }

        .theme-description {
            font-size: 0.875rem;
            color: var(--divider-color);
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .theme-metadata {
            font-size: 0.75rem;
            color: var(--bg-neutral-4);
            display: flex;
            justify-content: space-between;
            padding-top: 1rem;
            border-top: 1px solid var(--bg-neutral-3);
        }

        .tag {
            background-color: var(--bg-neutral-3);
            color: var(--font-color);
            padding: 0.25rem 0.5rem;
            border-radius: var(--radius-s);
            font-size: 0.75rem;
        }

        @media (max-width: 768px) {
            .themes-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }
    </style>





    @if (session('error'))
        <div style="color: var(--danger-color)">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div style="color: var(--primary-color)">
            {{ session('success') }}
        </div>
    @endif


    <div class="themes-container">
        <header class="header">
            <div class="header-content">
                <h1 class="page-title">Discover themes</h1>
                <x-button href="{{ route('themes.create') }}" class="new-theme-btn">+ New theme</x-button>
            </div>
        </header>

        <div class="filters">
            <button class="filter-btn active">All</button>
            <button class="filter-btn">Popular</button>
            <button class="filter-btn">Recent</button>
            <button class="filter-btn">Featured</button>
        </div>

        <main class="themes-grid">


            @foreach ($themes as $theme)
                <article class="theme-card">
                    <img src="{{ str_starts_with($theme->image, 'http') ? $theme->image : asset($theme->image) }}"
                        alt="{{ $theme->name }}">
                    <div class="theme-content">
                        <a style="all: unset;cursor: pointer;"
                            href="{{ route('themes.show', ['theme' => $theme->id]) }}">


                            <h2 class="theme-title"> {{ $theme->name }}</h2>
                            <p class="theme-description">
                                {{ $theme->description }}
                            </p>
                            <div class="theme-metadata">
                                <span>{{ $theme->manager->name }}</span>
                                <span>{{ $theme->created_at }}</span>
                            </div>
                    </div>
                    </a>
                </article>
            @endforeach


        </main>
    </div>
</x-app-layout>
