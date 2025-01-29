<x-app-layout>
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Navigation */
        .nav {
            background: var(--bg-neutral-2);
            border-bottom: 1px solid var(--bg-neutral-3);
            padding: 1rem;
            margin-bottom: 2rem;
        }

        .nav-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            font-size: 1.25rem;
            color: var(--font-color);
            text-decoration: none;
            font-weight: 500;
        }

        .nav-user {
            color: var(--divider-color);
            font-size: 0.875rem;
        }

        /* Header */
        .header {
            background: var(--bg-neutral-2);
            border: 1px solid var(--bg-neutral-3);
            border-radius: var(--radius-m);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .page-title {
            font-size: 2rem;
            color: var(--font-color);
        }

        .search-input {
            background: var(--bg-neutral-1);
            border: 1px solid var(--bg-neutral-3);
            border-radius: var(--radius-m);
            padding: 0.75rem 1rem;
            width: 300px;
            color: var(--font-color);
            font-size: 0.875rem;
        }

        .new-issue-btn {
            background: var(--primary-color);
            color: var(--bg-color);
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-m);
            border: none;
            font-size: 0.875rem;
            cursor: pointer;
            text-decoration: none;
        }

        /* Filters */
        .filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            background: var(--bg-neutral-2);
            padding: 1rem;
            border-radius: var(--radius-m);
            border: 1px solid var(--bg-neutral-3);
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            background: var(--bg-neutral-1);
            border: 1px solid var(--bg-neutral-3);
            border-radius: var(--radius-s);
            color: var(--font-color);
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn.active {
            background: var(--primary-color);
            color: var(--bg-color);
        }

        /* Issues Grid */
        .issues-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .issue-card {
            background: var(--bg-neutral-2);
            border: 1px solid var(--bg-neutral-3);
            border-radius: var(--radius-m);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .issue-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .issue-cover {
            position: relative;
            height: 400px;
        }

        .issue-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .issue-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--primary-color);
            color: var(--bg-color);
            padding: 0.25rem 0.75rem;
            border-radius: var(--radius-s);
            font-size: 0.75rem;
        }

        .issue-content {
            padding: 1.5rem;
        }

        .issue-title {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: var(--font-color);
        }

        .issue-metadata {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: var(--divider-color);
            padding-bottom: 1rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid var(--bg-neutral-3);
        }

        .issue-actions {
            display: flex;
            gap: 1rem;
        }

        .btn {
            flex: 1;
            padding: 0.75rem 1rem;
            border-radius: var(--radius-m);
            font-size: 0.875rem;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--primary-color);
            color: var(--bg-color);
        }

        .btn-secondary {
            background: var(--secondary-color);
            color: var(--bg-color);
        }

        /* Footer */
        .footer {
            margin-top: 4rem;
            padding: 2rem;
            background: var(--bg-neutral-2);
            border-top: 1px solid var(--bg-neutral-3);
            text-align: center;
            color: var(--divider-color);
            font-size: 0.875rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .header-content {
                flex-direction: column;
                align-items: stretch;
                gap: 1rem;
            }

            .search-input {
                width: 100%;
            }

            .filters {
                overflow-x: auto;
                padding-bottom: 0.5rem;
            }

            .filter-btn {
                white-space: nowrap;
            }

            .issues-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="container">
        <!-- Header -->
        <header class="header">
            <div class="header-content">
                <h1 class="page-title">Magazine Issues</h1>
                <input type="text" class="search-input" placeholder="Search issues...">
                <a href="#" class="new-issue-btn">+ New Issue</a>
            </div>
        </header>

        <!-- Filters -->
        <div class="filters">
            <button class="filter-btn active">All Issues</button>
            <button class="filter-btn">Latest</button>
            <button class="filter-btn">Most Read</button>
            <button class="filter-btn">Featured</button>
            <button class="filter-btn">Archived</button>
        </div>

        <!-- Issues Grid -->
        <main class="issues-grid">
            <!-- Issue Card 1 -->
            <article class="issue-card">
                <div class="issue-cover">
                    <img src="https://source.unsplash.com/random/600x800?magazine,tech" alt="January 2025 Issue">
                    <span class="issue-badge">New</span>
                </div>
                <div class="issue-content">
                    <h2 class="issue-title">January 2025 Edition</h2>
                    <div class="issue-metadata">
                        <span>Issue #124</span>
                        <span>Published: Jan 15, 2025</span>
                        <span>84 pages • 12 articles</span>
                        <span>By: @regisx001</span>
                    </div>
                    <div class="issue-actions">
                        <a href="#" class="btn btn-primary">Read Now</a>
                        <a href="#" class="btn btn-secondary">Download</a>
                    </div>
                </div>
            </article>

            <!-- Issue Card 2 -->
            <article class="issue-card">
                <div class="issue-cover">
                    <img src="https://source.unsplash.com/random/600x800?magazine,digital" alt="December 2024 Issue">
                </div>
                <div class="issue-content">
                    <h2 class="issue-title">December 2024 Edition</h2>
                    <div class="issue-metadata">
                        <span>Issue #123</span>
                        <span>Published: Dec 15, 2024</span>
                        <span>76 pages • 10 articles</span>
                        <span>By: @regisx001</span>
                    </div>
                    <div class="issue-actions">
                        <a href="#" class="btn btn-primary">Read Now</a>
                        <a href="#" class="btn btn-secondary">Download</a>
                    </div>
                </div>
            </article>

            <!-- Add more issue cards as needed -->
        </main>
    </div>
</x-app-layout>
