<x-guest-layout>


    <section class="login section" style="margin-top:30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title">Password Reset</h4>
                        <x-jet-validation-errors class="mb-4"/>

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="form-group mb-3 block">
                                <x-jet-label for="email" value="{{ __('Email') }}"/>
                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                             :value="old('email', $request->email)" required autofocus/>
                            </div>

                            <div class="form-group mb-3 mt-4">
                                <x-jet-label for="password" value="{{ __('Password') }}"/>
                                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password"/>
                            </div>

                            <div class="form-group mt-4">
                                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
                                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                             name="password_confirmation" required autocomplete="new-password"/>
                            </div>

                            <div class="button">
                                <x-jet-button class="btn">
                                    {{ __('Reset Password') }}
                                </x-jet-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
