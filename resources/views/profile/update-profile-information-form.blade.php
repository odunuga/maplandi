<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>
    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                       wire:model="photo"
                       x-ref="photo"
                       x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            "/>

                <x-jet-label for="photo" value="{{ __('Photo') }}"/>

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->image_url }}" alt="{{ $this->user->name }}"
                         class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2"/>
            </div>
    @endif

    <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}"/>
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.lazy="state.name"
                         autocomplete="name"/>
            <x-jet-input-error for="name" class="mt-2"/>
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}"/>
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.lazy="state.email"/>
            <x-jet-input-error for="email" class="mt-2"/>
        </div>
        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone" value="{{ __('Phone') }}"/>
            <x-jet-input id="phone" type="tel" class="mt-1 block w-full" placeholder="Your Phone Number"
                         wire:model.lazy="state.phone"/>
            <x-jet-input-error for="phone" class="mt-2"/>
        </div>
        <!-- Address -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="{{ __('Address') }}"/>
            <x-jet-input id="address" type="text" class="mt-1 block w-full" placeholder="Home Address"
                         wire:model.lazy="state.address"/>
            <x-jet-input-error for="address" class="mt-2"/>
        </div>
        <!-- State -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state" value="{{ __('State') }}"/>
            <x-jet-input id="state" type="text" class="mt-1 block w-full" placeholder="State"
                         wire:model.lazy="state.state"/>
            <x-jet-input-error for="state" class="mt-2"/>
        </div>
        <!-- Country -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="country" value="{{ __('Country') }}"/>
            <select name="country_code" class="form-select form-select-sm w-20p" wire:model.lazy="state.country_code">
                <option>{{ isset(auth()->user()->country)?auth()->user()->country->getName():'Select One' }}</option>
                @foreach($countries as $key=>$item)
                    <option value="{{ $key }}">{{ $item }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="country_code" class="mt-2"/>

        </div>
        <div class="col-span-6 sm:col-span-4 mt-5">
            <h3>{{__("texts.shipping_address")}}</h3>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="shipping_first_name" value="{{ __('Shipping First Name') }}"/>
            <x-jet-input id="shipping_first_name" type="text" class="mt-1 block w-full"
                         placeholder="Shipping First Name" name="shipping_first_name"
                         value="{{ isset(auth()->user()->shipping_address)?auth()->user()->shipping_address['first_name']:''}}"
                         wire:model.lazy="state.shipping_first_name"/>
            <x-jet-input-error for="state.shipping_first_name" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="shipping_last_name" value="{{ __('Shipping Last Name') }}"/>
            <x-jet-input id="shipping_last_name" type="text" class="mt-1 block w-full" placeholder="Shipping Last Name"
                         wire:model.lazy="state.shipping_last_name" name="shipping_last_name"
                         value="{{isset(auth()->user()->shipping_address)?auth()->user()->shipping_address['last_name']:''}}"
            />
            <x-jet-input-error for="shipping_last_name" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="shipping_phone" value="{{ __('Shipping Phone') }}"/>
            <x-jet-input id="shipping_phone" type="text" class="mt-1 block w-full" placeholder="Shipping Contact Number"
                         name="shipping_phone"
                         wire:model.lazy="state.shipping_phone"
                         value="{{isset(auth()->user()->shipping_address)?auth()->user()->shipping_address['phone']:''}}"
            />
            <x-jet-input-error for="shipping_phone" class="mt-2"/>
            <div class="flex flex-inline m-2">
                <x-jet-input id="same_phone" type="checkbox"
                             wire:click="$set('state.shipping_phone',document.getElementById('shipping_phone').value)"
                             onclick="setSame('phone','shipping_phone',this.checked)"
                />&nbsp;
                <x-jet-label for="same_phone" value="{{__('Same Phone')}}"/>
            </div>

        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="shipping_email" value="{{ __('Shipping Email') }}"/>
            <x-jet-input id="shipping_email" type="email" class="mt-1 block w-full" placeholder="Shipping Email Address"
                         wire:model.lazy="state.shipping_email" name="shipping_email"
                         value="{{isset(auth()->user()->shipping_address)?auth()->user()->shipping_address['email']:''}}"
            />
            <x-jet-input-error for="shipping_email" class="mt-2"/>
            <div class="flex flex-inline m-2">
                <x-jet-input id="same_email" type="checkbox" wire:click="state.shipping_email=state.email"
                             wire:click="$set('state.shipping_email',document.getElementById('shipping_email').value)"   onclick="setSame('email','shipping_email',this.checked)"/>&nbsp;
                <x-jet-label for="same_email" value="{{__('Same Email')}}"/>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="shipping_address" value="{{ __('Shipping Address') }}"/>
            <x-jet-input id="shipping_address" type="text" class="mt-1 block w-full" placeholder="Shipping Address"
                         name="shipping_address"
                         value="{{isset(auth()->user()->shipping_address)?auth()->user()->shipping_address['address']:''}}"
                         wire:model.lazy="state.shipping_address"/>
            <x-jet-input-error for="address" class="mt-2"/>
            <div class="flex flex-inline m-2">
                <x-jet-input id="same_address" type="checkbox" wire:click="$state.shipping_address=$state.address"    wire:click="$set('state.shipping_address',document.getElementById('shipping_address').value)"
                             onclick="setSame('address','shipping_address',this.checked)"/>&nbsp;
                <x-jet-label for="same_address" value="{{__('Same Address')}}"/>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
    @push('scripts')
        <script>
            let setSame = (from, to, value) => {
                let a = document.getElementById(from);
                let b = document.getElementById(to);
                if (value) {
                    return b.value = a.value
                } else {
                    return b.value = '';
                }

            }
        </script>
    @endpush
</x-jet-form-section>
