<x-guest-layout>


    <section class="login registration section" style="margin-top:30px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title">Sign Up</h4>
                        <x-jet-validation-errors class="mb-4"/>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <x-jet-label for="name" value="{{ __('Name') }}"/>
                                <x-jet-input id="name" type="text" name="name" :value="old('name')" required
                                             autofocus autocomplete="name"/>
                            </div>

                            <div class="form-group">
                                <x-jet-label for="email" value="{{ __('Email') }}"/>
                                <x-jet-input id="email" type="email" name="email" :value="old('email')" required/>
                            </div>

                            <div class="form-group">
                                <x-jet-label for="password" value="{{ __('Password') }}"/>
                                <x-jet-input id="password" type="password" name="password" required
                                             autocomplete="new-password"/>
                            </div>

                            <div class="form-group">
                                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
                                <x-jet-input id="password_confirmation" type="password"
                                             name="password_confirmation" required autocomplete="new-password"/>
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="check-and-pass mt-4">
                                    <x-jet-label for="terms">
                                        <div class="flex items-center">
                                            <x-jet-checkbox name="terms" id="terms"/>
                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-jet-label>
                                </div>
                            @endif

                            {{--                            <div class="flex items-center justify-end mt-4">--}}

                            {{--                                <div class="button">--}}
                            {{--                                    <x-jet-button class="ml-4">--}}
                            {{--                                        {{ __('Sign Up') }}--}}
                            {{--                                    </x-jet-button>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            {{--                            <div class="check-and-pass">--}}
                            {{--                                <div class="row align-items-center">--}}
                            {{--                                    <div class="col-12">--}}
                            {{--                                        <div class="form-check">--}}
                            {{--                                            <input type="checkbox" class="form-check-input width-auto"--}}
                            {{--                                                   id="exampleCheck1">--}}
                            {{--                                            <label class="form-check-label">Agree to our <a href="javascript:void(0)">Terms--}}
                            {{--                                                    and--}}
                            {{--                                                    Conditions</a></label>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="button">
                                <button type="submit" class="btn">Sign Up</button>
                            </div>
                        </form>
                        <div class="alt-option">
                            <span>Or</span>
                        </div>
                        <div class="socila-login">
                            <ul>
                                <li><a href="javascript:void(0)" class="google"><i class="lni lni-google"></i>Sign
                                        Up
                                        With Google</a>
                                </li>
                            </ul>
                        </div>
                        <p class="outer-link mt-5 text-center">Already have an account?
                            <a href="{{ route('login') }}" class="nav-link text-red-700 hover:text-red-400">Login Now</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
