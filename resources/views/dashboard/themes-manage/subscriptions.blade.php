<x-dashboard-layout>
    <section class="dashboard-section">
        <h2>Gestion des Abonnement </h2>
        <div class="history-container">
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Theme</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($subscription_requests as $request)
                        <tr>
                            <td>{{ $request->theme->name }}</td>
                            <td>{{ $request->user->name }}</td>
                            <td>{{ $request->created_at }}</td>
                            <td style="display: flex;gap: 1rem">
                                <x-button size="sm" class="btn-primary full-w">Approve</x-button>
                                <x-button size="sm" class="btn-danger full-w">Reject</x-button>

                                {{-- <form class="full-w" action="{{ route('history.destroy') }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <input type="hidden" required name="article_id"
                                        value="{{ $history->article->id }}">
                                    <x-button type="submit" size="sm"
                                        class="btn-danger outline full-w">Suprimmer</x-button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </section>


    {{-- {{ $subscription_requests }} --}}
</x-dashboard-layout>
