<x-dashboard-layout>

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

        .search-container {
            margin: 1rem 0 2rem;
            position: relative;
        }

        #searchInput {
            width: 100%;
            padding: 0.75rem 1rem;
            padding-left: 2.5rem;
            background: var(--bg-neutral-2);
            border: 1px solid var(--bg-neutral-3);
            border-radius: var(--radius-m);
            color: var(--font-color);
            font-size: 1rem;
        }

        #searchInput:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--bg-neutral-4);
        }

        .theme-card {
            display: block;
            /* For smooth hide/show */
        }

        .theme-card.hidden {
            display: none;
        }

        .search-info {
            color: var(--divider-color);
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        #noResults {
            grid-column: 1 / -1;
            text-align: center;
            padding: 2rem;
            background: var(--bg-neutral-2);
            border-radius: var(--radius-l);
            color: var(--divider-color);
            display: none;
        }
    </style>
    <section class="dashboard-section">
        <header class="welcome-header">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                <h1>Manage Your Themes</h1>
            </div>

            <div class="search-container">
                <span class="search-icon">🔍</span>
                <input type="text" id="searchInput" placeholder="Search themes by name, description, or tags..."
                    autocomplete="off">
                <div class="search-info" id="searchInfo"></div>
            </div>
        </header>

        <main class="themes-grid" id="themesGrid">
            @foreach ($themes as $theme)
                <article class="theme-card" data-name="{{ strtolower($theme->name) }}"
                    data-description="{{ strtolower($theme->description) }}">
                    <img src="{{ str_starts_with($theme->image, 'http') ? $theme->image : asset($theme->image) }}"
                        alt="{{ $theme->name }}">
                    <div class="theme-content">
                        <a style="all: unset;cursor: pointer;"
                            href="{{ route('themes.show', ['theme' => $theme->id]) }}">
                            <h2 class="theme-title">{{ $theme->name }}</h2>
                            <p class="theme-description">
                                {{ $theme->description }}
                            </p>
                            <div style="gap: 1rem" class="theme-metadata">
                                <x-button href="{{ route('dashboard.theme.subscriptions', ['id' => $theme->id]) }}"
                                    class="btn-primary outline full-w">Subscriptions</x-button>
                                <x-button href="{{ route('dashboard.theme.articles', ['id' => $theme->id]) }}"
                                    class="btn-primary outline full-w">Articles</x-button>
                            </div>
                        </a>
                    </div>
                </article>
            @endforeach

            <div id="noResults">
                <h3>No matching themes found</h3>
                <p>Try adjusting your search terms</p>
            </div>
        </main>
    </section>

    <script>
        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const themesGrid = document.getElementById('themesGrid');
        const themeCards = document.querySelectorAll('.theme-card');
        const searchInfo = document.getElementById('searchInfo');
        const noResults = document.getElementById('noResults');

        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        function performSearch() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            let visibleCount = 0;

            if (searchTerm === '') {
                themeCards.forEach(card => {
                    card.classList.remove('hidden');
                });
                searchInfo.textContent = '';
                noResults.style.display = 'none';
                return;
            }

            themeCards.forEach(card => {
                const name = card.dataset.name;
                const description = card.dataset.description;

                if (name.includes(searchTerm) || description.includes(searchTerm)) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            // Update search info and no results message
            searchInfo.textContent = `Found ${visibleCount} theme${visibleCount !== 1 ? 's' : ''}`;
            noResults.style.display = visibleCount === 0 ? 'block' : 'none';
        }

        // Debounce search for better performance
        const debouncedSearch = debounce(performSearch, 300);

        searchInput.addEventListener('input', debouncedSearch);

        // Clear search when clicking the X (clear) button
        searchInput.addEventListener('search', function() {
            if (this.value === '') {
                performSearch();
            }
        });
    </script>
</x-dashboard-layout>
