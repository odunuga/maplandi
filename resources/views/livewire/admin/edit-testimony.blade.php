<form wire:submit.prevent="submit_testimony" method="post">
    <div class="modal-body">
        <input type="hidden" wire:model="testimony"/>

        <div class="form-group">
            <label class="label">Body</label>
            <textarea wire:model.lazy="body" name="advert">
            </textarea>
        </div>

    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Update <i class="fa fa-spinner fa-spin" wire:loading ></i>
        </button>
    </div>
</form>

