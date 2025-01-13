<x-app-layout>
    <div class="themes-container">
        @foreach ($themes as $theme)
            <div class="theme-card">
                <img src="{{ $theme->image }}" alt="{{ $theme->name }}">
                <h2>{{ $theme->name }}</h2>
                <p>{{ $theme->description }}</p>
                <x-button class="btn-primary" href="#">Discover</x-button>
            </div>
        @endforeach
    </div>
</x-app-layout>
