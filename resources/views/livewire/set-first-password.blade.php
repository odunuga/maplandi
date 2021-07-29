<form wire:submit.prevent="setNewPassword">
    <div class="form-group mt-5">
        <label>{{ __('texts.new_password') }}</label>
        <input type="password" name="password" wire:model.defer="password"
               placeholder="{{__('texts.new_password_placeholder')}}"
               class="form-control"/>
        @error('password') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label>{{__('texts.confirm_password')}}</label>
        <input type="password" name="password_confirmation" wire:model.defer="password_confirmation"
               placeholder="{{ __("texts.confirm_password_placeholder") }}"
               class="form-control"/>
        @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-sm btn-outline-primary"><i wire:loading
                                                                        class="lni lni-is-spinning lni-spinner"></i> {{  __('buttons.update') }}
        </button>
    </div>
</form>
