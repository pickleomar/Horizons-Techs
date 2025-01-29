<x-guest-layout>

    <style>
        #hero {
            text-align: center;
            padding: 6rem 2rem;
            background: linear-gradient(45deg, var(--bg-neutral-1), var(--bg-color));
        }

        #hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .grid {
            display: grid;
            gap: 2rem;
        }

        .grid-3 {
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        .grid-4 {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }

        .card {
            background: var(--bg-neutral-2);
            border: 1px solid var(--bg-neutral-3);
            border-radius: var(--radius-l);
            padding: 1.5rem;
        }


        .section {
            padding: 4rem 2rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .img-cover {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: var(--radius-m);
            background: var(--bg-neutral-3);
        }

        footer {
            background: var(--bg-neutral-1);
            padding: 4rem 2rem;
            border-top: 1px solid var(--bg-neutral-3);
        }

        @media (max-width: 768px) {
            #nav {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            #hero h1 {
                font-size: 2.5rem;
            }

        }
    </style>

    <main style="margin: 0 15%">
        <section id="hero">
            <div class="container">
                <h1>Your Gateway to the Latest in Tech Innovation</h1>
                <p
                    style="color: var(--divider-color); margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto;">
                    Explore curated articles, subscribe to themes, and join our growing community of knowledge
                    seekers.
                </p>
                <div style="display: flex; gap: 1rem; justify-content: center;">
                    <x-button class="btn-primary" href="{{ route('register') }}">Get Started</x-button>


                    <x-button class="btn-primary" href="{{ route('themes.index') }}">Explore Themes</x-button>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section-header">
                    <h2>Featured Articles</h2>
                    {{--  //TODO public articles<a href="#" class="btn btn-outline">View All</a> --}}
                </div>
                <div class="grid grid-3">
                    @foreach ($articles as $article)
                        <article class="card">
                            <img class="img-cover"
                                src="{{ str_starts_with($article->image, 'http') ? $article->image : asset($article->image) }}"
                                alt="Web Development">
                            <div style="margin-top: 1rem;">
                                <div style="color: var(--primary-color); margin-bottom: 0.5rem;">
                                    {{ $article->theme->name }}</div>
                                <h3 style="margin-bottom: 1rem;">{{ $article->title }}</h3>

                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span
                                        style="color: var(--bg-neutral-4);">{{ $article->created_at->diffForHumans() }}</span>
                                    <x-button class="btn-secondary outline"
                                        href="{{ route('articles.show', ['article' => $article, 'theme' => $article->theme]) }}">
                                        Read More
                                    </x-button>
                                </div>
                            </div>
                        </article>
                    @endforeach

                </div>
            </div>
        </section>

        <section class="section" style="background: var(--bg-neutral-1);">
            <div class="container">
                <div class="section-header">
                    <h2>Popular Themes</h2>
                    <a href="#" class="btn btn-outline"></a>
                    <x-button class="btn-secondary" href="{{ route('themes.index') }}"> Explore All</x-button>
                </div>
                <div class="grid grid-4">
                    @foreach ($themes as $theme)
                        <div class="card" style="text-align: center;">
                            <h3 style="margin-bottom: 1rem;">{{ $theme->name }}</h3>
                            <p
                                style="color: var(--divider-color); margin-bottom: 1.5rem;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;overflow: hidden;">
                                {{ $theme->description }}
                            </p>
                            <x-button class="btn-primary" href="{{ route('themes.show', ['theme' => $theme]) }}">Learn
                                More</x-button>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <section class="section" style="text-align: center;">
            <div class="container">
                <h2>Ready to Get Started?</h2>
                <p style="color: var(--divider-color); margin: 1rem 0 2rem;">
                    Join our community today and start exploring amazing content curated just for you.
                </p>
                <x-button class="btn-primary" href="{{ route('register') }}">Create Account</x-button>
            </div>
        </section>
    </main>

    <script>
        // Simple scroll to top button functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Update current time
            const timeElements = document.getElementsByTagName('time');
            for (let timeEl of timeElements) {
                if (!timeEl.textContent) {
                    timeEl.textContent = '2025-01-28 21:35:06';
                }
            }

            // Update user info
            const userElements = document.querySelectorAll('#user-info span');
            for (let userEl of userElements) {
                if (userEl.textContent.includes('@')) {
                    userEl.textContent = '@regisx001';
                }
            }

            // Optional: Add smooth scroll behavior for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const href = this.getAttribute('href');
                    if (href !== '#') {
                        document.querySelector(href).scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</x-guest-layout>
