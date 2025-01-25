<aside class="sidebar">
    <nav class="sidebar-nav">
        <div style="display: flex;flex-direction: row;justify-content: center">
            <a href="/">
                <img src="/header_logo.png" alt="header tech horizon iot programming">
            </a>
            <h3 style="margin:1rem 3rem;text-decoration: underline">{{ strtoupper(Auth::user()->role) }}</h3>

        </div>

        <a href="{{ route('dashboard.index') }}" class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
            </svg>
            <span>Dashboard</span>
        </a>

        @if (!Auth::user()->isEditor())
            <a href="{{ route('dashboard.subscriptions') }}"
                class="nav-item {{ request()->is('dashboard/subscriptions') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <path d="M22 6l-10 7L2 6"></path>
                </svg>
                <span>Abonnements</span>
            </a>
        @endif

        @if (Auth::user()->isEditor() || Auth::user()->isAdmin())
            <a href="{{ route('dashboard.themes') }}"
                class="nav-item {{ request()->is('dashboard/themes') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-template">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 4m0 1a1 1 0 0 1 1 -1h14a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-14a1 1 0 0 1 -1 -1z" />
                    <path d="M4 12m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                    <path d="M14 12l6 0" />
                    <path d="M14 16l6 0" />
                    <path d="M14 20l6 0" />
                </svg>
                <span>Theme Management</span>
            </a>
        @endif

        <a href="#" class="nav-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
            </svg>
            <span>Proposer un Article</span>
        </a>
        <a href="{{ route('dashboard.history') }}"
            class="nav-item {{ request()->is('dashboard/history') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>Historique</span>
        </a>
    </nav>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a style="margin: 1rem"
            onclick="event.preventDefault();
                                this.closest('form').submit();"
            href="#" class="nav-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <path d="M16 17l5-5-5-5"></path>
                <path d="M21 12H9"></path>
            </svg>
            <span>Déconnexion</span>
        </a>
    </form>


</aside>
