<form wire:submit.prevent="add_category" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label class="label">Category</label>
            <select class="form-control" wire:model="category_id" title="Select Category Which product is under">
                <option value="">None</option>
                @if(isset($categories))
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
            <input class="form-control" wire:model.lazy="name" placeholder="Enter Category name"
                   required>
        </div>
        <div class="form-group">
            <label for="image" class="label"><i class="fa fa-shopping-bag"></i> {{ __('text.add_icon') }}</label>
            <input id="image" hidden type="file" wire:model="icon">
            @error('icon') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add <i class="lni lni-is-spinning lni-spinner"></i>
        </button>
    </div>
</form>

