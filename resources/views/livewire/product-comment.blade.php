<div class="single-block comments">
    <h3>Comments</h3>
    @if($comments)
        @foreach($comments as $comment)
            <livewire:product-comment :comment="$comment" key="{{$comment->id}}"/>
        @endforeach
    @else
        <p class="text-center p-6">No Comments</p>
    @endif
</div>
<div class="single-block comment-form">
    <h3>Post a comment</h3>
    <form wire:submit.prevent="sendNewComment" method="POST">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="form-box form-group">
                    <input type="text" name="name" class="form-control form-control-custom"
                           placeholder="Your Name" required/>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="form-box form-group">
                    <input type="email" name="email" class="form-control form-control-custom"
                           placeholder="Your Email" required/>
                </div>
            </div>
            <div class="col-12">
                <div class="form-box form-group">
                                            <textarea name="#" class="form-control form-control-custom"
                                                      placeholder="Your Comments" required></textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="button">
                    <button type="submit" class="btn">Post Comment</button>
                </div>
            </div>
        </div>
    </form>
</div>
