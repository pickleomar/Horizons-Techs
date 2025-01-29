<header class="header-container">
    <div>
        <a href="/">
            <img src="/header_logo.png" alt="header tech horizon iot programming">
        </a>
    </div>
    <nav>
        <a href="{{ route('magazines.index') }}">Issues</a>
        <a href="{{ route('articles.public') }}">Public Articles</a>
        <a href="{{ route('themes.index') }}">Themes</a>
        @guest
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endguest

        @auth

            <a href="{{ route('dashboard.index') }}">Dashboard</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href=""
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        @endauth
    </nav>
</header>
