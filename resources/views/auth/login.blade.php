<x-guest-layout>

    <section class="login section" style="margin-top:30px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title">Login</h4>
                        <x-jet-validation-errors class="mb-4"/>

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <x-jet-label for="email" value="{{ __('Username or Email') }}"/>
                                <x-jet-input id="email" type="email" name="email" :value="old('email')" required
                                             autofocus/>
                            </div>
                            <div class="form-group">
                                <x-jet-label for="password" value="{{ __('Password') }}"/>
                                <x-jet-input id="password" type="password" name="password"
                                             required autocomplete="current-password"/>


                            </div>
                            <div class="check-and-pass">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <label for="remember_me" class="flex items-center">
                                            <x-jet-checkbox id="remember_me" name="remember"/>
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        @if (Route::has('password.request'))
                                            <a class="lost-pass" href="{{ route('password.request') }}">
                                                {{ __('Lost your password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="button">
                                <x-jet-button class="btn">
                                    {{ __('Login Now') }}
                                </x-jet-button>
                            </div>
                        </form>
                        <div class="alt-option">
                            <span>Or</span>
                        </div>
                        <div class="socila-login">
                            <ul>

                                <li><a href="javascript:void(0)" class="google"><i class="lni lni-google"></i>Login
                                        With
                                        Google</a>
                                </li>
                            </ul>
                        </div>
                        <p class="outer-link mt-5">Don't have an account? <a href="{{ route('register') }}">Register
                                here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
