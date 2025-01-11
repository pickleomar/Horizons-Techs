<x-guest-layout>
    <section style="margin: 0 15%; display: flex; justify-content: space-between; align-items: center;">
        <div style="width: 100%;display: flex;flex-direction: column;justify-content: space-evenly;">

            <span style="font-size: 2.5rem;font-weight: 700;">Your Gateway to the Latest in Tech Innovation.</span>
            <br>
            <span style="font-size: 1rem;font-weight: 700;margin:1rem 0">Explore the new tech update</span>
            <div style="display: flex;gap: 2rem;margin:1rem 0;">
                <x-button size="lg" style="" class="btn-primary" :href="route('articles.index')">Start Reading </x-button>
                <x-button size="lg" style="" class="btn-primary">Subscribe</x-button>
            </div>
        </div>
        <div style="display:grid; place-items: center;width: 100%;">
            <img src="/img/explore_it.png" alt="">
        </div>
    </section>

</x-guest-layout>
