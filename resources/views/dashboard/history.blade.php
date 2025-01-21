<x-dashboard-layout>


    <section class="dashboard-section">
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

                    @foreach ($histories as $history)
                        <tr>
                            <td>{{ $history->article->title }}</td>
                            <td>{{ $history->user->name }}</td>
                            <td>{{ $history->consultation_date }}</td>
                            <td>
                                <x-button
                                    href="{{ route('articles.show', ['theme' => $history->article->theme_id, 'article' => $history->article]) }}"
                                    size="sm" class="btn-secondary">Voir</x-button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        {{-- {{ $histories }} --}}
    </section>

</x-dashboard-layout>
