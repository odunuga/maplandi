<form wire:submit.prevent="add_promotion" method="post">
    <div class="modal-body">
        <input type="hidden" wire:model="products"/>
        <div class="form-group">
            @if (isset($image))
                <img src="{{ (is_string($image))?$image:$image->temporaryUrl() }}" class="img-thumbnail h-12">
            @endif
            <label for="image" class="label"><i class="fa fa-file-upload"></i> {{ __('texts.add_promo_image') }}</label>
            <input id="image" hidden type="file" wire:model="image">
            @error('image') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="label">Promo Name</label>
            <input class="form-control" wire:model.lazy="title" placeholder="Enter Promo Name"
                   required>
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="label">Rate</label>
            <input class="form-control" wire:model.lazy="rate" placeholder="Enter discount rate in % e.g 5%"
                   required>
            @error('rate') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label class="label">Condition of Promo</label>
            <select id="condition" class="form-control" wire:model="condition" wire:change="$emit('selectChanged')"
                    required>
                <option value="">Select Condition</option>
                <option value="1">Add to Specific Products</option>
                <option value="0">Discount on all product purchase</option>
            </select>
            @error('condition') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            @error('description') <span class="error">{{ $message }}</span> @enderror
            <textarea class="form-control" wire:model.lazy="description" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label class="label">Start Date</label>
            <input type="datetime-local" class="form-control" wire:model.lazy="start_date" placeholder="dd/mm/yy"
                   required>
            @error('start_date') <span class="error">{{ $message }}</span> @enderror
        </div>

        @if($continuous && ($continuous!==1 || $continuous!=='1'))
            <div class="form-group">
                <label class="label">End Date</label>
                <input type="datetime-local" class="form-control" wire:model.lazy="end_date" placeholder="dd/mm/yy"
                       required>
                @error('end_date') <span class="error">{{ $message }}</span> @enderror
            </div>
        @endif
        <div class="form-group" wire:ignore>
            <label>This is a nonstop promo?</label>
            <input type="radio" class="checkbox-row" wire:model="continuous" name="continuous" value="0">&nbsp;Yes
            <input type="radio" class="checkbox-row" wire:model="continuous" name="continuous" value="1">&nbsp;No
        </div>

        @if($condition && ($condition===1 || $condition ==='1'))
            <div class="form-group" wire:ignore>
                <select id="selectProducts" class="form-control form-control-custom "
                        onchange="emitUpdate()"
                        multiple>
                    <option value="" disabled>Select Products to Apply on</option>
                    @foreach($all_products as  $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Add <i class="fa fa-spinner fa-spin" wire:loading></i>
        </button>
    </div>
</form>

