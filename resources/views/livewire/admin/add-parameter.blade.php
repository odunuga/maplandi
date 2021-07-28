<form wire:submit.prevent="add_parameter" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label class="label">Parameters</label>
            <select class="form-control" wire:model="parameter_id" title="Select Old">
                <option value="">New Parameter</option>
                @if(isset($parameters))
                    @foreach($parameters as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
            <input class="form-control" wire:model.lazy="name" placeholder="Enter Parameter name"
                   @if($lock) disabled @endif
                   required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add <i class="lni lni-is-spinning lni-spinner"></i>
        </button>
    </div>
</form>
