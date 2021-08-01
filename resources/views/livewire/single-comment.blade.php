<div class="single-comment">
    <img
        src="{{ $comment->image_url }}"
        alt="#">
    <div class="content">
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
        <span>{{ $comment->created_at->diffForHumans() }}</span>
        <p>
            {!! $comment->body !!}
        </p>
    </div>
</div>
