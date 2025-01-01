<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name">Name</label>
            <input id="name" class="" type="text" name="name" :value="old('name')" required autofocus
                autocomplete="name" />
            <div>
                {{ implode('', $errors->get('name')) }}
            </div>
        </div>

        <!-- Email Address -->
        <div class="">
            <label for="email">Email</label>
            <input id="email" class="" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <div>
                {{ implode('', $errors->get('email')) }}
            </div>
        </div>

        <!-- Password -->
        <div class="">
            <label for="password">Password</label>

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

            {{ implode('', $errors->get('password_confirmation')) }}

        </div>

        <div class="">
            <a class="" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button class="">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>
