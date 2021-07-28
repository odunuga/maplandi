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
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add <i class="lni lni-is-spinning lni-spinner"></i>
        </button>
    </div>
</form>

