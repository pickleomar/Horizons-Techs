{{-- Main THing  --}}

<div class="">
    <div class="">{{ Auth::user()->name }}</div>
    <div class="">{{ Auth::user()->email }}</div>
</div>




<x-slot name="content">
    <x-dropdown-link :href="route('profile.edit')">
        {{ __('Profile') }}
    </x-dropdown-link>

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
</x-slot>





<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
    {{ __('Dashboard') }}
</x-nav-link>
