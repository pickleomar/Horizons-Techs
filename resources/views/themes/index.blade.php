<x-app-layout>
    <div class="themes-container">
        @foreach ($themes as $theme)
            <div class="theme-card">
                {{-- <img src="{{ $theme->image }}" alt="{{ $theme->name }}"> --}}
                <img src="https://plus.unsplash.com/premium_photo-1682145730713-34bba6d3d14a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="{{ $theme->name }}">
                <h2>{{ $theme->name }}</h2>
                <p>{{ $theme->description }}</p>
                <x-button class="btn-primary"
                    href="{{ route('themes.show', ['theme' => $theme->id]) }}">Discover</x-button>
            </div>
        @endforeach
    </div>
</x-app-layout>
