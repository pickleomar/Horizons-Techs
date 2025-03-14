<x-dashboard-layout>



    <style>
        .sub-request-container {
            background: var(--bg-color-n-3);
            padding: 1.5rem;
            border-radius: var(--radius-l);
            border: 1px solid var(--bg-color-n-2);
            overflow-x: auto;
        }

        .sub-request-table {
            width: 100%;
            border-collapse: collapse;
        }

        .sub-request-table th,
        .sub-request-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--bg-color-n-2);
        }

        .sub-request-table th {
            font-weight: 600;
            color: var(--font-color);
        }

        .sub-request-table tbody tr:hover {
            background: var(--outline-color);
        }
    </style>
    <section class="dashboard-section">
        <h2>Gestion des Abonnement </h2>
        <div class="sub-request-container">
            <table class="sub-request-table">
                <thead>
                    <tr>
                        <th>Theme</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Feedback</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($subscription_requests as $sub_request)
                        <tr>
                            <td>{{ $sub_request->theme->name }}</td>
                            <td>{{ $sub_request->user->name }}</td>
                            <td>{{ $sub_request->created_at }}</td>
                            <td><input id="feedback" type="text" value="{{ $sub_request->feedback }}"
                                    placeholder="feedback"></td>
                            <td style="display: flex;gap: 1rem">
                                <form class="full-w"
                                    action="{{ route('subscriptions.approve', ['user_id' => $sub_request->user->id, 'theme_id' => $sub_request->theme->id]) }}"
                                    method="post">
                                    @csrf
                                    <input id="fbback1" type="hidden" name="feedback" value="">
                                    <x-button type="submit" size="sm"
                                        class="btn-primary full-w">Approve</x-button>
                                </form>

                                <form class="full-w"
                                    action="{{ route('subscriptions.reject', ['user_id' => $sub_request->user->id, 'theme_id' => $sub_request->theme->id]) }}"
                                    method="post">
                                    @csrf

                                    <input id="fbback2" type="hidden" name="feedback" value="">
                                    <x-button type="submit" size="sm" class="btn-danger full-w">Reject</x-button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </section>

    <script>
        feedback1 = document.getElementById("fbback1");
        feedback2 = document.getElementById("fbback2");

        document.getElementById("feedback").addEventListener('input', function() {
            feedback1.value = this.value;
            feedback2.value = this.value;
            console.log(event.target.value);
        });
    </script>

</x-dashboard-layout>
