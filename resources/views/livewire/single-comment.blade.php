<div class="single-comment">
    <img
        src="{{ $comment->image_url }}" alt="#">
    <div class="content">
        @auth()
            <div class="relative pull-right flex flex-inline">
                <div x-data="{ open: false }" class="bg-white" @click.away="open=false">
                    <a href="javascript:void(0)" @click="open = !open"
                       :class="{'font-semibold': open, 'shadow-none': open}">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                             class="ml-1 inline-block fill-current text-gray-500 w-6 h-6">
                            <path fill-rule="evenodd"
                                  d="M15.3 10.3a1 1 0 011.4 1.4l-4 4a1 1 0 01-1.4 0l-4-4a1 1 0 011.4-1.4l3.3 3.29 3.3-3.3z"
                                  :class="{'rotate-180': open}"></path>
                        </svg>
                    </a>
                    <ul x-transition:enter="transition-transform transition-opacity ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-end="opacity-0 transform -translate-y-3" x-show="open"
                        class=" absolute bg-white mt-2 shadow rounded w-40 py-1 ">
                        @if($comment->comment_by_id === auth()->id())
                            <li><a href="javascript:void(0)" class="py-1 px-3 block text-green-400" wire:click="edit()">
                                    Edit</a>
                            </li>
                            <li><a href="javascript:void(0)"
                                   class="py-1 px-3 border-b block text-red-400 hover:text-red-900"
                                   wire:click="delete()">Delete</a>
                        @endif
                        @if($comment->comment_by_id !== auth()->id())
                            <li><a href="javascript:void(0)" class="py-1 px-3 block hover:text-red-500"
                                   wire:click="report()">
                                    Report</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        @endauth
        <h4>
            @isset($comment->name)
                {{  $comment->name}}
            @else
                @isset( $comment->comment_by)
                    {{ $comment->comment_by->name }}
                @else
                    {{  'anonymous' }}
                @endisset
            @endisset</h4>
        <span>{{ isset($comment->created_at)?$comment->created_at->diffForHumans():'' }}</span>
        <p>
            {!! $comment->body !!}
        </p>
    </div>
</div>
