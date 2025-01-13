<x-auth-layout>

    {{ session('status') }}

    <form class="authentication-form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="flex-column">
            <label>Email </label>
        </div>
        <div class="inputForm">
            <input type="email" name="email" :value="old('email')" required placeholder="Enter your Email" />
        </div>
        <div style="color: #F14336">
            {{ implode('', $errors->get('email')) }}
        </div>

        <div class="flex-column">
            <label>Name </label>
        </div>
        <div class="inputForm">
            <input type="text" name="name" required placeholder="Enter your Name" />
        </div>
        <div style="color: #F14336">
            {{ implode('', $errors->get('name')) }}
        </div>

        <div class="flex-column">
            <label>Password </label>
        </div>
        <div class="inputForm">
            <input type="password" name="password" placeholder="Enter your Password" />
        </div>
        <div style="color: #F14336">
            {{ implode('', $errors->get('password')) }}
        </div>

        <div class="flex-row">
            <label for="remember_me" class="">
                <input id="remember_me" type="checkbox" class="" name="remember">
                <span class="">{{ __('Remember me') }}</span>
            </label>


            @if (Route::has('password.request'))
                <a class="span" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        <x-button style="margin-top: 1rem;" type="submit" class="full-w btn-primary">Sign Up</x-button>
        <p style="margin: 6px;text-align: center;display: inline;">Already have an account?
            <a href="{{ route('login') }}" class="span">Login</a>
        </p>
        <div class="flex-row">
            <hr style="width: 100%;">
            <p style="margin: 6px;text-align: center;font-weight: 600;width:30%;display: inline;">Or With</p>
            <hr style="width: 100%;">
        </div>

        <div class="flex-row">
            <x-button class="btn btn-neutral full-w">
                <svg version="1.1" width="20" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                    style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <path style="fill:#FBBB00;" d="M113.47,309.408L95.648,375.94l-65.139,1.378C11.042,341.211,0,299.9,0,256
              c0-42.451,10.324-82.483,28.624-117.732h0.014l57.992,10.632l25.404,57.644c-5.317,15.501-8.215,32.141-8.215,49.456
              C103.821,274.792,107.225,292.797,113.47,309.408z"></path>
                    <path style="fill:#518EF8;" d="M507.527,208.176C510.467,223.662,512,239.655,512,256c0,18.328-1.927,36.206-5.598,53.451
              c-12.462,58.683-45.025,109.925-90.134,146.187l-0.014-0.014l-73.044-3.727l-10.338-64.535
              c29.932-17.554,53.324-45.025,65.646-77.911h-136.89V208.176h138.887L507.527,208.176L507.527,208.176z">
                    </path>
                    <path style="fill:#28B446;" d="M416.253,455.624l0.014,0.014C372.396,490.901,316.666,512,256,512
              c-97.491,0-182.252-54.491-225.491-134.681l82.961-67.91c21.619,57.698,77.278,98.771,142.53,98.771
              c28.047,0,54.323-7.582,76.87-20.818L416.253,455.624z"></path>
                    <path style="fill:#F14336;" d="M419.404,58.936l-82.933,67.896c-23.335-14.586-50.919-23.012-80.471-23.012
              c-66.729,0-123.429,42.957-143.965,102.724l-83.397-68.276h-0.014C71.23,56.123,157.06,0,256,0
              C318.115,0,375.068,22.126,419.404,58.936z"></path>
                </svg>

                <span>
                    Google
                </span>
            </x-button>



            <x-button class="btn btn-neutral full-w">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-brand-github">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                </svg>
                <span>
                    Github
                </span>
            </x-button>
        </div>
    </form>

</x-auth-layout>
