<div class="single-block comments">
    <h3>{{__('shop.comments')}}</h3>
    @if($comments)
        @foreach($comments as $comment)
            <livewire:product-comment :comment="$comment" key="{{$comment->id}}"/>
        @endforeach
    @else
        <p class="text-center p-6">{{ __('shop.no-comment') }}</p>
    @endif
</div>
<div class="single-block comment-form">
    <h3>{{__('shop.post-a-comment')}}</h3>
    <form wire:submit.prevent="sendNewComment" method="POST">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="form-box form-group">
                    <input type="text" wire:model="name" name="name" class="form-control form-control-custom"
                           placeholder="Your Name" value="{{ auth()->check()?auth()->user()->name:'' }}" required/>
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="form-box form-group">
                    <input type="email" wire:model="email" name="email" class="form-control form-control-custom"
                           placeholder="Your Email" value="{{auth()->check()?auth()->user()->email:''}}" required
                           readonly/>
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-box form-group">
                    @error('comment') <span class="error">{{ $message }}</span> @enderror
                    <textarea name="comment" wire:model="comment"
                              class="form-control form-control-custom"
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
