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

                    @foreach ($subscription_requests as $sub_request)
                        <tr>
                            <td>{{ $sub_request->theme->name }}</td>
                            <td>{{ $sub_request->user->name }}</td>
                            <td>{{ $sub_request->created_at }}</td>
                            <td style="display: flex;gap: 1rem">
                                <form class="full-w"
                                    action="{{ route('subscriptions.approve', ['user_id' => $sub_request->user->id, 'theme_id' => $sub_request->theme->id]) }}"
                                    method="post">
                                    @csrf
                                    <x-button type="submit" size="sm" class="btn-primary full-w">Approve</x-button>
                                </form>

                                <form class="full-w"
                                    action="{{ route('subscriptions.reject', ['user_id' => $sub_request->user->id, 'theme_id' => $sub_request->theme->id]) }}"
                                    method="post">
                                    @csrf
                                    <x-button type="submit" size="sm" class="btn-danger full-w">Reject</x-button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </section>


    {{-- {{ $subscription_requests }} --}}
</x-dashboard-layout>
