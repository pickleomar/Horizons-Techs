<x-dashboard-layout>

    <section class="dashboard-section">

        <div class="welcome-header">
            <h1>Bienvenue, John Doe</h1>
            <p>Voici un aperçu de vos abonnements et activités</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>Abonnements Actifs</h3>
                <p class="stat-number">5</p>
            </div>
            <div class="stat-card">
                <h3>Articles Non Lus</h3>
                <p class="stat-number">12</p>
            </div>
            <div class="stat-card">
                <h3>Notifications</h3>
                <p class="stat-number">3</p>
            </div>
        </div>

        <h2>Vos Abonnements</h2>
        <div class="subscriptions-grid">
            <div class="subscription-card">
                <h3>Intelligence Artificielle</h3>
                <div class="badge badge-warning">8 articles non lus</div>
                <x-button class="btn-primary">Explorer</x-button>
            </div>
            <div class="subscription-card">
                <h3>Cybersécurité</h3>
                <div class="badge badge-warning">3 articles non lus</div>
                <x-button class="btn-primary">Explorer</x-button>

            </div>
            <div class="subscription-card">
                <h3>IoT</h3>
                <div class="badge badge-primary">1 article non lu</div>
                <x-button class="btn-primary">Explorer</x-button>

            </div>
        </div>

        <h2>Historique de Navigation</h2>
        <div class="history-container">
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Article</th>
                        <th>Auteur</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>L'avenir de l'IA générative</td>
                        <td>Marie Martin</td>
                        <td>14/01/2025</td>
                        <td>
                            <x-button size="sm" class="btn-secondary">Voir</x-button>
                        </td>
                    </tr>
                    <tr>
                        <td>Sécurité des objets connectés</td>
                        <td>Paul Dubois</td>
                        <td>13/01/2025</td>
                        <td>
                            <x-button size="sm" class="btn-secondary">Voir</x-button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

</x-dashboard-layout>
