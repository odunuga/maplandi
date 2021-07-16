<x-app-layout>
    {{--    @dd($user)--}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome ').$user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{__('welcome.first_password.message')}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <livewire:set-first-password/>
        </div>
    </div>
</x-app-layout>
