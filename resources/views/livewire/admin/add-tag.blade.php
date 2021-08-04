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
        <button type="submit" class="btn btn-danger">Add <i  class="fa fa-spinner fa-spin" wire:loading></i>
        </button>
    </div>
</form>
