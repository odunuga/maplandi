<form wire:submit.prevent="build_properties" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label class="label">Input Type</label>
            <select class="form-control" wire:model="new_type" title="Select Old" required>
                <option value="">Select One</option>
                @foreach($input_type as $type)
                    <option value="{{ $type }}"
                            class="@if($type=='input') selected @endif">{{ ucfirst($type) }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Name of Input</label>
            <input type="text" wire:model.lazy="new_name" class="form-control" placeholder="Input Name"/>
        </div>
        <div class="form-group">
            <label>CSS Classes</label>
            <input type="text" wire:model.lazy="class" class="form-control" placeholder="Enter Css Classes"/>
        </div>
        <div class="form-group">
            <label>ID of Input</label>
            <input type="text" wire:model.lazy="new_id" class="form-control" placeholder="Input ID"/>
        </div>
        <input hidden wire:model="parameter_id">
        @if($new_type==='select')
            <div class="form-group">
                <label>Extra Data (for dropdown field)</label>
                <ul class="list-unstyled">
                    @foreach($attributes as $list)
                        <li><i class="lni lni-arrow-right"></i> {{ ucfirst($list) }}</li>
                    @endforeach
                </ul>
                <input type="text" placeholder="Enter Data One After the Other" wire:model.lazy="single_data"
                       class="form-control"/>
                <button type="button" class="my-2 btn btn-secondary" wire:model.lazy="new_data" wire:click="add_data"> +
                </button>
            </div>
        @endif
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add <i class="lni lni-is-spinning lni-spinner"></i>
        </button>
    </div>
</form>

