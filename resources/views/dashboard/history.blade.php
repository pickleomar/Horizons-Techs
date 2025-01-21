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
                            <td>{{ $history->article->author->name }}</td>
                            <td>{{ $history->consultation_date }}</td>
                            <td style="display: flex;gap: 1rem">
                                <x-button
                                    href="{{ route('articles.show', ['theme' => $history->article->theme_id, 'article' => $history->article]) }}"
                                    size="sm" class="btn-secondary full-w">Voir</x-button>

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
