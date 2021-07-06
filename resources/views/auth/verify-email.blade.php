<x-app-layout>
    <section class="login section" style="margin-top:30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title">E-mail Verification</h4>

                        <div class="font-18 text-center animate__animated animate__fadeInDown">
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </div>

                        @if (session('status') == 'verification-link-sent')
                            <div >
                                <h5 class="font-18 text-center animate__animated animate__fadeInDown">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </h5>

                                <h1 class="display-4 text-center text-danger animate__animated animate__heartBeat"></h1>
                                <i class="lni lni-envelope"></i>
                            </div>
                        @endif

                        <div class="mt-4 flex items-center justify-between">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <div>
                                    <x-jet-button type="submit">
                                        {{ __('Resend Verification Email') }}
                                    </x-jet-button>
                                </div>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</x-app-layout>
