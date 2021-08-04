<form wire:submit.prevent="add_tag" method="post">
    <div class="modal-body">
        <div class="form-group" wire:ignore>
            <label class="label">Add Tags To Product</label>
            <input type="hidden" id="product_tags" hidden wire:model="product_tags"/>
            <select id="selectTags" class="form-control" class="form-control form-control-custom "
                    onchange="emitUpdate()"
                    multiple>
                <option value="">Select Tag</option>
                @if(isset($tags))
                    @foreach($tags as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        @if($prev)
            <div class="form-group">
                <label>Current Tags are
                    : @foreach($prev as $item) @if(count($prev)>1 && $loop->last) and {{ $item }}  @else {{ $item }}
                    , @endif @endforeach</label>
            </div>
        @endif
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Add <i class="fa fa-spinner fa-spin" wire:loading></i>
        </button>
    </div>
</form>
