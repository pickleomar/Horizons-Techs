<x-guest-layout>
    <div class="">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <label for="password">Password</label>

            <input id="password" class="" type="password" name="password" required autocomplete="current-password" />

            <div>
                {{ implode('', $errors->get('password')) }}
            </div>
        </div>

        <div class="">
            <button>
                {{ __('Confirm') }}
            </button>
        </div>
    </form>
</x-guest-layout>
