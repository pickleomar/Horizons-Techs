<x-app-layout>
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
