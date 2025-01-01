<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <label for="email">Email</label>
            <input id="email" class="" type="email" name="email" :value="old('email', $request - > email)"
                required autofocus autocomplete="username" />
            <div>

                {{ implode('', $errors->get('email')) }}
            </div>
        </div>

        <!-- Password -->
        <div class="">
            <label for="password">
                Password
            </label>
            <input id="password" class="" type="password" name="password" required autocomplete="new-password" />
            <div>
                {{ implode('', $errors->get('password')) }}
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="">
            <label for="password_confirmation">
                Confirm Password
            </label>

            <input id="password_confirmation" class="" type="password" name="password_confirmation" required
                autocomplete="new-password" />

            <div>
                {{ implode('', $errors->get('password_confirmation')) }}
            </div>
        </div>

        <div class="">
            <button>
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
</x-guest-layout>
