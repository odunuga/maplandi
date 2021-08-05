<li class="list-group-item d-flex justify-content-between align-items-center">
    {{ $category->title }}
    <div>
        <a class="btn btn-secondary btn-sm" href="{{ url('control-room/builder/'.$category->id) }}">Builder</a>
    </div>
    <a class="btn btn-success" href="{{ url('control-room/category/'.$category->id.'/edit') }}">Edit</a>

    @if($to_delete)
        <button class="btn btn-danger btn-sm" wire:click="delete_category()">Are you sure?
        </button>
    @else
        <button class="btn btn-secondary btn-sm" wire:click="confirm_delete()">Delete</button>
    @endif
</li>
