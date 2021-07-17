<x-app-layout>
    <section class="login section" style="margin-top:30px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Welcome ').$user->name }}
                        </h2>
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            {{__('welcome.first_password.message')}}
                        </div>

                        <livewire:set-first-password/>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
