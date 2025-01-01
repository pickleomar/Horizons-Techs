<x-guest-layout>
    <!-- Session Status -->
    {{ session('status') }}

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email">Email</label>
            <input id="email" class="" type="email" name="email" :value="old('email')" required autofocus
                autocomplete="username" />
            <div>
                {{ implode('', $errors->get('email')) }}
            </div>
        </div>

        <!-- Password -->
        <div class="">

            <label for="password">Password</label>
            <input id="password" type="password" name="password" autocomplete="current-password">
            <div>
                {{ implode('', $errors->get('password')) }}
            </div>
        </div>

        <!-- Remember Me -->
        <div class="">
            <label for="remember_me" class="">
                <input id="remember_me" type="checkbox" class="" name="remember">
                <span class="">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="">
            @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button class="">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</x-guest-layout>
