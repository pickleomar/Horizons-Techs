<x-dashboard-layout>
    <section class="dashboard-section">

        <header class="welcome-header">
            <h1>Manage Your Themes</h1>
            <input type="text" class="search-bar" placeholder="Search themes...">
        </header>

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
                            <div style="gap: 1rem" class="theme-metadata">
                                <x-button class="btn-primary outline full-w">Subscriptions</x-button>
                                <x-button class="btn-primary outline full-w">Articles</x-button>
                            </div>
                    </div>
                    </a>
                </article>
            @endforeach
        </main>

    </section>
</x-dashboard-layout>
