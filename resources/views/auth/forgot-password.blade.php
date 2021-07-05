<x-guest-layout>

    <section class="login section" style="margin-top:30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title">Password Recovery</h4>
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Forgot your password? Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <x-jet-validation-errors class="mb-4"/>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <x-jet-label for="email" value="{{ __('Enter Email') }}"/>
                                <x-jet-input id="email" type="email" name="email"
                                             :value="old('email')" required autofocus/>
                            </div>
                            <div class="button">
                                <x-jet-button class="btn">
                                    {{ __('Recover Password') }}
                                </x-jet-button>
                            </div>
                        </form>
                    </div>
                    <div class="container">
                        <a href="{{ route('login')}}"><i class="lni lni-arrow-left"></i> {!! __('Login') !!}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-guest-layout>
