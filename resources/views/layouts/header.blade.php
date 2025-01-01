<header class="header-container">
    <div>
        <a href="/">
            <img src="/header_logo.png" alt="header tech horizon iot programming">
        </a>
    </div>
    <div>
        <input type="text" placeholder="Search ...">
    </div>
    <nav>
        <a href="#">Themes</a>
        @guest
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endguest

        @auth


            <form method="POST" action="{{ route('logout') }}">
                <label style="font-weight: 800;text-decoration: underline" for="">
                    {{ Auth::user()->name }}
                </label>
                @csrf

                <a href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        @endauth
    </nav>
</header>
