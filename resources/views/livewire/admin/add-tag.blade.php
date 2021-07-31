<form wire:submit.prevent="add_item" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label class="label">Title</label>
            <input class="form-control" id="tag_title" wire:model.lazy="title" placeholder="Enter Tag Name"
                   required>
            <input type="hidden" wire:model="tag_id"/>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add <i class="lni lni-is-spinning lni-spinner"></i>
        </button>
    </div>
</form>
