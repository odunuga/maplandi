<li class="list-group-item d-flex justify-content-between align-items-center">
    {{ $parameter->title }}

    @if($to_delete)
        <button class="btn btn-danger btn-sm" wire:click="delete_category()">Are you sure?
        </button>
    @else
        <button class="btn btn-secondary btn-sm" wire:click="confirm_delete()">Delete</button>
    @endif
</li>
