<div class="single-block comment-form" wire:ignore>
    <h3>{{__('shop.post-a-comment')}}</h3>
    <form method="post" wire:submit.prevent="sendNewComment">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="form-box form-group">
                    <input type="text" wire:model="name" name="name" class="form-control form-control-custom"
                           placeholder="Your Name" required/>
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="form-box form-group">
                    <input type="email" wire:model="email" name="email" class="form-control form-control-custom"
                           placeholder="Your Email" required
                           readonly/>
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-box form-group">
                    @error('comment') <span class="error">{{ $message }}</span> @enderror
                    <textarea name="comment" wire:model.lazy="comment"
                              class="form-control form-control-custom"
                              placeholder="Your Comments"   required></textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="button" @guest disabled @endguest>
                    <button type="submit" class="btn">Post Comment <i class="lni lni-spinner lni-is-spinning"
                                                                      wire:loading></i></button>
                </div>
            </div>
        </div>
    </form>
</div>
