<x-dashboard-layout>
    {{-- <section class="dashboard-section">
        <header class="welcome-header">
            <h1>Manage Your Subscriptions</h1>
            <input type="text" class="search-bar" placeholder="Search themes...">
        </header>
        <section class="subscription-grid">
            <div class="theme-card">
                <h2>Artificial Intelligence</h2>
                <p>Explore the latest in AI technology and machine learning advancements.</p>
                <div class="subscription-action">

                    <x-button class="btn-primary  full-w"> Details</x-button>
                    <x-button class="btn-warning outline full-w"> Unsubscribe</x-button>

                </div>
            </div>
            <div class="theme-card">
                <h2>Artificial Intelligence</h2>
                <p>Explore the latest in AI technology and machine learning advancements.</p>
                <div class="subscription-action">

                    <x-button class="btn-primary  full-w"> Details</x-button>
                    <x-button class="btn-warning outline full-w"> Unsubscribe</x-button>

                </div>
            </div>
            <div class="theme-card">
                <h2>Artificial Intelligence</h2>
                <p>Explore the latest in AI technology and machine learning advancements.</p>
                <div class="subscription-action">

                    <x-button class="btn-primary  full-w"> Details</x-button>
                    <x-button class="btn-warning outline full-w"> Unsubscribe</x-button>

                </div>
            </div>
            <div class="theme-card">
                <h2>Artificial Intelligence</h2>
                <p>Explore the latest in AI technology and machine learning advancements.</p>
                <div class="subscription-action">

                    <x-button class="btn-primary  full-w"> Details</x-button>
                    <x-button class="btn-warning outline full-w"> Unsubscribe</x-button>

                </div>
            </div>

            <div class="theme-card">
                <h2>Artificial Intelligence</h2>
                <p>Explore the latest in AI technology and machine learning advancements.</p>
                <div class="subscription-action">

                    <x-button class="btn-primary  full-w"> Details</x-button>
                    <x-button class="btn-warning outline full-w"> Unsubscribe</x-button>

                </div>
            </div>
            <div class="theme-card">
                <h2>Artificial Intelligence</h2>
                <p>Explore the latest in AI technology and machine learning advancements.</p>
                <div class="subscription-action">

                    <x-button class="btn-primary  full-w"> Details</x-button>
                    <x-button class="btn-warning outline full-w"> Unsubscribe</x-button>

                </div>
            </div>
        </section>

    </section>
    </div>  --}}

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
                        <x-button class="btn-primary full-w" href="#">Details</x-button>
                        <form action="{{ route('subscriptions.destroy', ['theme_id' => $subscription->theme_id]) }}"
                            method="POST" class="inline-form">
                            @csrf
                            @method('DELETE')
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
