<form wire:submit.prevent="testimony_save" method="post">
    <div class="col-12">
        @csrf
        <input type="hidden" hidden wire:model="token"/>
        <input type="hidden" hidden wire:model="user_id"/>
        <div class="col-12 my-3">
            <div class="form-group">
                <label class="label my-1">Kindly Type your Comment</label>
                <textarea class="form-control" rows="5" wire:model.lazy="testimony" required></textarea>
            </div>
        </div>
        <div class="col-12 my-3">
            <div class="form-group">
                <button type="submit" class="btn btn-danger" wire:loading.attr="disabled"> Submit</button>
            </div>
        </div>
    </div>
</form>
