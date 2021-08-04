<form wire:submit.prevent="submit_testimony" method="post">
    <div class="modal-body">
        <input type="hidden" wire:model="testimony"/>

        <div class="form-group">
            <label class="label">Body</label>
            <textarea wire:model.lazy="body" name="advert" class="form-control" rows="5">
            </textarea>
        </div>
        @if(isset($testimony) && $testimony['publish'])
            <div class="form-group">
                <label class="label">Publish</label>
                <input type="radio" wire:model="publish" value="1"> Yes <input type="radio" wire:model="publish"
                                                                                 value="0">No
            </div>
        @endif
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-danger" wire:loading.attr="disabled">Update <i class="fa fa-spinner fa-spin" wire:loading></i>
        </button>
    </div>
</form>

