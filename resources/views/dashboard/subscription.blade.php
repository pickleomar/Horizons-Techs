<x-dashboard-layout>
    <style>
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--bg-neutral-3);
        }

        .header-content {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }



        .search-container {
            position: relative;
            max-width: 300px;
            width: 100%;
        }

        .search-input {
            width: 100%;
            padding: 0.75rem 1rem;
            padding-left: 2.5rem;
            background: var(--bg-neutral-2);
            border: 1px solid var(--bg-neutral-3);
            border-radius: var(--radius-m);
            color: var(--font-color);
            transition: border-color 0.2s;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--bg-neutral-4);
        }

        .subscription-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .theme-card {
            background: var(--bg-neutral-2);
            border-radius: var(--radius-l);
            border: 1px solid var(--bg-neutral-3);
            padding: 1.5rem;
            transition: all 0.2s;
            position: relative;
            overflow: hidden;
        }

        .theme-card h2 {
            color: var(--font-color);
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .subscription-date {
            font-size: 0.75rem;
            color: var(--bg-neutral-4);
        }

        .theme-card p {
            color: var(--divider-color);
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            line-height: 1.5;
        }

        .subscription-status {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--primary-color);
        }

        .subscription-action {
            display: flex;
            gap: 0.75rem;
            opacity: 1;
        }

        .stats-container {
            margin-bottom: 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .stat-card {
            background: var(--bg-neutral-2);
            border-radius: var(--radius-m);
            padding: 1rem;
            text-align: center;
        }

        .stat-value {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--divider-color);
            font-size: 0.875rem;
        }



        @media (max-width: 768px) {
            .dashboard-header {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }

            .search-container {
                max-width: 100%;
            }
        }
    </style>

    <section class="dashboard-section">
        <header class="dashboard-header">
            <div class="header-content">
                <h1>Manage Your Subscriptions</h1>

            </div>
            <div class="search-container">
                <span class="search-icon">🔍</span>
                <input type="text" class="search-input" id="searchInput" placeholder="Search themes...">
            </div>
        </header>

        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-value">{{ count($subscriptions) }}</div>
                <div class="stat-label">Active Subscriptions</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $totalThemes ?? 0 }}</div>
                <div class="stat-label">Available Themes</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $lastUpdated ?? 0 }}</div>
                <div class="stat-label">Days Since Last Update</div>
            </div>
        </div>



        <section class="subscription-grid" id="subscriptionGrid">
            @forelse ($subscriptions as $subscription)
                <div class="theme-card" data-name="{{ strtolower($subscription->theme->name) }}"
                    data-date="{{ $subscription->created_at }}">
                    <div class="subscription-status"></div>
                    <h2>
                        {{ $subscription->theme->name }}
                        <span class="subscription-date">
                            {{ $subscription->created_at->diffForHumans() }}
                        </span>
                    </h2>
                    <p>{{ $subscription->theme->description }}</p>
                    <div class="subscription-action">
                        <a href="{{ route('themes.show', ['theme' => $subscription->theme_id]) }}"
                            class="btn btn-primary">
                            Details
                        </a>
                        <button class="btn btn-warning" onclick="showUnsubscribeDialog({{ $subscription->theme_id }})">
                            Unsubscribe
                        </button>
                    </div>
                </div>
            @empty
                <div class="no-subscriptions">
                    <h2 style="margin-bottom: 1rem; color: var(--font-color)">No Subscriptions Yet</h2>
                    <p>Start exploring themes to find content that interests you!</p>
                    <a href="{{ route('themes.index') }}" class="btn btn-primary"
                        style="display: inline-block; margin-top: 1rem">
                        Explore Themes
                    </a>
                </div>
            @endforelse
        </section>
    </section>

    <!-- Confirmation Dialog -->
    <div class="overlay" id="overlay"></div>
    <div class="confirmation-dialog" id="unsubscribeDialog">
        <h3 style="margin-bottom: 1rem">Confirm Unsubscribe</h3>
        <p style="margin-bottom: 1.5rem">Are you sure you want to unsubscribe from this theme?</p>
        <form action="{{ route('subscriptions.destroy') }}" method="POST" id="unsubscribeForm">
            @csrf
            @method('DELETE')
            <input type="hidden" name="theme_id" id="themeIdInput">
            <div style="display: flex; gap: 1rem;">
                <button type="button" class="btn btn-secondary" onclick="hideUnsubscribeDialog()">
                    Cancel
                </button>
                <button type="submit" class="btn btn-warning">
                    Confirm Unsubscribe
                </button>
            </div>
        </form>
    </div>

    <script>
        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const subscriptionGrid = document.getElementById('subscriptionGrid');
        const themeCards = document.querySelectorAll('.theme-card');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();

            themeCards.forEach(card => {
                const name = card.dataset.name;
                if (name.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Filter functionality
        const filterChips = document.querySelectorAll('.filter-chip');

        filterChips.forEach(chip => {
            chip.addEventListener('click', function() {
                // Remove active class from all chips
                filterChips.forEach(c => c.classList.remove('active'));
                // Add active class to clicked chip
                this.classList.add('active');

                const filter = this.dataset.filter;
                const now = new Date();

                themeCards.forEach(card => {
                    const date = new Date(card.dataset.date);
                    const daysDiff = (now - date) / (1000 * 60 * 60 * 24);

                    switch (filter) {
                        case 'recent':
                            card.style.display = daysDiff <= 7 ? 'block' : 'none';
                            break;
                        case 'updated':
                            // Add logic for recently updated
                            break;
                        case 'favorite':
                            // Add logic for favorites
                            break;
                        default:
                            card.style.display = 'block';
                    }
                });
            });
        });

        // Unsubscribe dialog
        function showUnsubscribeDialog(themeId) {
            document.getElementById('themeIdInput').value = themeId;
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('unsubscribeDialog').style.display = 'block';
        }

        function hideUnsubscribeDialog() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('unsubscribeDialog').style.display = 'none';
        }
    </script>
</x-dashboard-layout>
