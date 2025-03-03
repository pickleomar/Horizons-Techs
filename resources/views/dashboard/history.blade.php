<x-dashboard-layout>
    <style>
        .history-container {
            background: var(--bg-color-n-3);
            padding: 1.5rem;
            border-radius: var(--radius-l);
            border: 1px solid var(--bg-color-n-2);
            overflow-x: auto;
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
        }

        .history-table th,
        .history-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--bg-color-n-2);
        }

        .history-table th {
            font-weight: 600;
            color: var(--font-color);
        }

        .history-table tbody tr:hover {
            background: var(--outline-color);
        }
    </style>

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
                            <td>{{ $history->article->author->name }}</td>
                            <td>{{ $history->consultation_date }}</td>
                            <td style="display: flex;gap: 1rem">
                                <x-button
                                    href="{{ route('articles.show', ['theme' => $history->article->theme_id, 'article' => $history->article]) }}"
                                    size="sm" class="btn-secondary full-w">Show</x-button>

                                <form class="full-w" action="{{ route('history.destroy') }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <input type="hidden" required name="article_id"
                                        value="{{ $history->article->id }}">
                                    <x-button type="submit" size="sm"
                                        class="btn-danger outline full-w">Suprimmer</x-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        {{-- {{ $histories }} --}}
    </section>

</x-dashboard-layout>
