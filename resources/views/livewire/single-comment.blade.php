<div class="single-comment">
    <img
        src="{{ asset(isset($comment->comment_by->image)?$comment->comment_by->image->url:'vendor/images/dashboard/noimg.png') }}"
        alt="#">
    <div class="content">
        <h4>{{ $comment->name??$comment->comment_by->name??'anonymous' }}</h4>
        <span>{{ $comment->created_at->diffForHumans() }}</span>
        <p>
            {!! $comment->body !!}
        </p>
    </div>
</div>
