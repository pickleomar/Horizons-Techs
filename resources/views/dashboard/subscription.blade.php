<x-dashboard-layout>
    <style>
        .subscription-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .subscription-card {
            background: var(--bg-color-n-1);
            padding: 1.5rem;
            border-radius: var(--radius-l);
            border: 1px solid var(--bg-color-n-2);
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .subscription-action {
            display: flex;
            margin-top: 0.5rem;
            gap: 0.25rem;
        }
    </style>

    <section class="dashboard-section">
        <header class="welcome-header">
            <h1>Manage Your Subscriptions</h1>
            <input type="text" class="search-bar" placeholder="Search themes...">
        </header>
        <section class="subscription-grid">
            @forelse ($subscriptions as $subscription)
                <div class="theme-card">
                    <h2>{{ $subscription->theme->name }}</h2>
                    <p>{{ $subscription->theme->description }}</p>
                    <div class="subscription-action">
                        <x-button class="btn-primary full-w"
                            href="{{ route('themes.show', ['theme' => $subscription->theme_id]) }}">Details</x-button>



                        <form action="{{ route('subscriptions.destroy') }}" method="POST" class="inline-form">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" required name="theme_id" value="{{ $subscription->theme_id }}">
                            <x-button class="btn-warning outline full-w" type="submit">Unsubscribe</x-button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="no-subscriptions">You have no subscriptions yet. Explore themes to subscribe!</p>
            @endforelse
        </section>
    </section>


</x-dashboard-layout>
