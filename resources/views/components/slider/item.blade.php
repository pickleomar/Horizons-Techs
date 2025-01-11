<div class="slide">
    <img src="{{ $image }}" alt="{{ $title }}">
    <div class="slide-info">
        <h1>{{ $title }}</h1>
        <h4>Published on: {{ $publication_date }}| {{ $author }}</h4>
        {{-- <h4>Published on: Date Here| {{ $author }}</h4> --}}
        <p>
            {{ $content }}
        </p>
        <x-button href="{{ $url }}" class="btn-primary">
            Read Article
        </x-button>
    </div>
</div>
