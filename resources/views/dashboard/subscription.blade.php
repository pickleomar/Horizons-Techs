<x-dashboard-layout>
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .search-bar {
            padding: 0.75rem;
            border-radius: var(--radius-m);
            border: 1px solid var(--outline-color);
            background-color: var(--bg-color-n-3);
            color: var(--font-color);
            width: 300px;
        }

        .subscription-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .theme-card {
            background-color: var(--bg-color-n-3);
            padding: 1.5rem;
            border-radius: var(--radius-l);
            border: 1px solid var(--outline-color);
            transition: transform 0.3s ease;
        }

        .theme-card:hover {
            transform: translateY(-5px);
        }

        .theme-card h3 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .theme-card p {
            margin-bottom: 1rem;
            color: var(--font-color);
        }

        .status {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: var(--radius-m);
            margin-bottom: 1rem;
        }

        .status.subscribed {
            background-color: var(--primary-color);
        }

        .status.not-subscribed {
            background-color: var(--tertiary-color);
        }

        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            padding: 0.75rem 1rem;
            border: none;
            border-radius: var(--radius-m);
            cursor: pointer;
            transition: background-color 0.3s ease;
            flex: 1;
        }

        .action-btn.primary {
            background-color: var(--primary-color);
            color: var(--font-color);
        }

        .action-btn.secondary {
            background-color: var(--secondary-color);
            color: var(--font-color);
        }

        .toast {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background-color: var(--primary-color);
            color: var(--font-color);
            padding: 1rem;
            border-radius: var(--radius-m);
            animation: slideIn 0.3s ease, fadeOut 0.3s ease 4.7s;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(0);
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }
    </style>

    <header class="header">
        <h1>Manage Your Subscriptions</h1>
        <input type="text" class="search-bar" placeholder="Search themes...">
    </header>
    <section class="subscription-grid">
        <!-- Example Theme Cards -->
        <div class="theme-card">
            <h3>Artificial Intelligence</h3>
            <p>Explore the latest in AI technology and machine learning advancements.</p>
            <span class="status subscribed">Subscribed</span>
            <div class="actions">
                <button class="action-btn primary" onclick="toggleSubscription(this)">Unsubscribe</button>
                <button class="action-btn secondary">Details</button>
            </div>
        </div>
        <div class="theme-card">
            <h3>Cybersecurity</h3>
            <p>Stay updated with the latest in digital security and threat prevention.</p>
            <span class="status not-subscribed">Not Subscribed</span>
            <div class="actions">
                <button class="action-btn primary" onclick="toggleSubscription(this)">Subscribe</button>
                <button class="action-btn secondary">Details</button>
            </div>
        </div>
        <div class="theme-card">
            <h3>Cloud Computing</h3>
            <p>Learn about cloud technologies and infrastructure solutions.</p>
            <span class="status not-subscribed">Not Subscribed</span>
            <div class="actions">
                <button class="action-btn primary" onclick="toggleSubscription(this)">Subscribe</button>
                <button class="action-btn secondary">Details</button>
            </div>
        </div>
    </section>



    <script>
        function toggleSubscription(button) {
            const card = button.closest('.theme-card');
            const statusSpan = card.querySelector('.status');

            if (button.innerText === "Subscribe") {
                button.innerText = "Unsubscribe";
                statusSpan.textContent = "Subscribed";
                statusSpan.classList.remove('not-subscribed');
                statusSpan.classList.add('subscribed');
                showToast("Successfully subscribed to the theme");
            } else {
                button.innerText = "Subscribe";
                statusSpan.textContent = "Not Subscribed";
                statusSpan.classList.remove('subscribed');
                statusSpan.classList.add('not-subscribed');
                showToast("Successfully unsubscribed from the theme");
            }
        }

        function showToast(message) {
            const toast = document.createElement("div");
            toast.className = "toast";
            toast.innerText = message;
            document.body.appendChild(toast);
            setTimeout(() => {
                toast.remove();
            }, 5000);
        }

        // Search functionality
        const searchBar = document.querySelector('.search-bar');
        searchBar.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.theme-card');

            cards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const description = card.querySelector('p').textContent.toLowerCase();

                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</x-dashboard-layout>
